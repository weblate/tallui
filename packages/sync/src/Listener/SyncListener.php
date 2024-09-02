<?php

namespace Moox\Sync\Listener;

use Illuminate\Database\QueryException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Moox\Sync\Models\Platform;
use Moox\Sync\Models\Sync;

class SyncListener
{
    protected $currentPlatformId;

    public function __construct()
    {
        $domain = explode('.', request()->getHost());

        if (is_array($domain)) {
            $domain = implode('.', $domain);
        }

        try {
            $platform = Platform::where('domain', $domain)->first();

            if ($platform) {
                $this->currentPlatformId = $platform->id;
                $this->logDebug('Platform found for domain: '.$domain);
            } else {
                $this->logDebug("Platform not found for domain: {$domain}");
                $this->currentPlatformId = null;
            }
        } catch (QueryException $e) {
            Log::error("Database error occurred while querying for domain: {$domain}. Error: ".$e->getMessage());
            $this->currentPlatformId = null;
        } catch (\Exception $e) {
            Log::error('An unexpected error occurred: '.$e->getMessage());
            $this->currentPlatformId = null;
        }
    }

    public function registerListeners()
    {
        if ($this->currentPlatformId) {
            $syncs = Sync::where('source_platform_id', $this->currentPlatformId)
                ->where('status', true)
                ->get();
            foreach ($syncs as $sync) {
                $this->registerModelListeners($sync);
            }
        }
    }

    protected function registerModelListeners(Sync $sync)
    {
        $modelClass = $sync->source_model;

        $this->logDebug('Listen to Events for '.$modelClass);

        Event::listen("eloquent.created: {$modelClass}", function ($model) use ($sync) {
            $this->logDebug('Event created for '.$model->id);
            $this->handleEvent($model, 'created', $sync);
        });

        Event::listen("eloquent.updated: {$modelClass}", function ($model) use ($sync) {
            $this->logDebug('Event updated for '.$model->title);
            $this->handleEvent($model, 'updated', $sync);
        });

        Event::listen("eloquent.deleted: {$modelClass}", function ($model) use ($sync) {
            $this->logDebug('Event deleted for '.$model->id);
            $this->handleEvent($model, 'deleted', $sync);
        });
    }

    protected function handleEvent($model, $eventType, Sync $sync)
    {
        $data = $model->toArray();
        $syncData = [
            'event_type' => $eventType,
            'model' => $data,
            'sync' => $sync->toArray(),
        ];

        $this->logDebug('Invoke Webhook for '.$this->currentPlatformId);

        $this->invokeWebhook($sync, $syncData);
    }

    protected function invokeWebhook(Sync $sync, array $data)
    {
        $webhookUrl = 'https://'.$sync->targetPlatform->domain.'/sync-webhook';

        $this->logDebug('Push to Webhook:', ['url' => $webhookUrl, 'data' => $data]);

        try {
            $response = Http::asJson()->post($webhookUrl, $data);

            if ($response->successful()) {
                $this->logDebug('Webhook invoked successfully.', ['url' => $webhookUrl, 'response' => $response->body()]);
            } elseif ($response->clientError()) {
                Log::warning('Client error occurred when invoking webhook.', [
                    'url' => $webhookUrl,
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
            } elseif ($response->serverError()) {
                Log::error('Server error occurred when invoking webhook.', [
                    'url' => $webhookUrl,
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
            } else {
                Log::warning('Unexpected status code returned when invoking webhook.', [
                    'url' => $webhookUrl,
                    'status' => $response->status(),
                    'response' => $response->body(),
                ]);
            }
        } catch (RequestException $e) {
            Log::error('Error occurred during HTTP request to webhook.', [
                'url' => $webhookUrl,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        } catch (\Exception $e) {
            Log::error('Unexpected error occurred.', [
                'url' => $webhookUrl,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    protected function logDebug($message, array $context = [])
    {
        if (app()->environment() !== 'production') {
            Log::debug($message, $context);
        }
    }
}
