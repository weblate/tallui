<?php

declare(strict_types=1);

namespace Moox\Sync;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Config;
use Moox\Sync\Commands\InstallCommand;
use Moox\Sync\Http\Middleware\PlatformTokenAuthMiddleware;
use Moox\Sync\Jobs\SyncBackupJob;
use Moox\Sync\Jobs\SyncPlatformJob;
use Moox\Sync\Listener\SyncListener;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SyncServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('sync')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasRoute('api')
            ->hasMigrations(['01_create_platforms_table', '02_create_syncs_table', '03_create_model_platform_table'])
            ->hasCommand(InstallCommand::class);
    }

    public function boot(): void
    {
        parent::boot();

        $this->app->make('router')->aliasMiddleware(
            'auth.platformtoken',
            PlatformTokenAuthMiddleware::class
        );

        $this->registerSyncBackupJob();
        $this->registerSyncEloquentListener();
    }

    protected function registerSyncPlatformJob(): void
    {
        $syncPlatformJobConfig = Config::get('sync.sync_platform_job');

        if ($syncPlatformJobConfig['enabled']) {
            $this->app->booted(function () use ($syncPlatformJobConfig) {
                $schedule = $this->app->make(Schedule::class);
                $schedule->job(new SyncPlatformJob)->{$syncPlatformJobConfig['frequency']}();
            });
        }
    }

    protected function registerSyncBackupJob(): void
    {
        $syncBackupJobConfig = Config::get('sync.sync_backup_job');

        if ($syncBackupJobConfig['enabled']) {
            $this->app->booted(function () use ($syncBackupJobConfig) {
                $schedule = $this->app->make(Schedule::class);
                $schedule->job(new SyncBackupJob)->{$syncBackupJobConfig['frequency']}();
            });
        }
    }

    protected function registerSyncEloquentListener(): void
    {
        $syncEloquentListenerConfig = Config::get('sync.sync_eloquent_listener');

        if ($syncEloquentListenerConfig['enabled']) {
            $syncListener = $this->app->make(SyncListener::class);
            $syncListener->registerListeners();
        }
    }
}
