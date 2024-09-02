<?php

namespace Moox\Sync\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\HtmlString;
use Moox\Sync\Models\Platform;
use Moox\Sync\Models\Sync;
use Moox\Sync\Resources\SyncResource\Pages\CreateSync;
use Moox\Sync\Resources\SyncResource\Pages\EditSync;
use Moox\Sync\Resources\SyncResource\Pages\ListSyncs;
use Moox\Sync\Resources\SyncResource\Pages\ViewSync;
use Moox\Sync\Services\ModelCompatibilityChecker;

class SyncResource extends Resource
{
    protected static ?string $model = Sync::class;

    protected static ?string $navigationIcon = 'gmdi-sync';

    protected static ?string $recordTitleAttribute = 'title';

    private static function generateTitle(callable $get)
    {
        if (! $get('source_platform_id') || ! $get('target_platform_id')) {
            return '';
        }

        $status = $get('status');
        $sourceModel = $get('source_model');
        $sourcePlatform = Platform::find($get('source_platform_id'));
        $targetModel = $get('target_model');
        $targetPlatform = Platform::find($get('target_platform_id'));
        $usePlatformRelations = $get('use_platform_relations');
        $useTransformerClass = $get('use_transformer_class');
        $filterIds = $get('filter_ids');
        $fieldMappings = $get('field_mappings');
        $interval = $get('interval');

        if (! $sourcePlatform || ! $targetPlatform) {
            return '';
        }

        $sync_status = $status ? '' : 'Disabled: ';
        $sync_action = $useTransformerClass ? 'Transform' : 'Sync';

        $title = "{$sync_status}{$sync_action} {$sourcePlatform->domain} ({$sourceModel}) to {$targetPlatform->domain} ({$targetModel})";

        if ($filterIds == 'sync_only_ids') {
            $title .= ' partially';
        } elseif ($filterIds == 'ignore_ids') {
            $title .= ' excluding records';
        }

        if ($usePlatformRelations) {
            $title .= ' by platform';
        }

        if ($fieldMappings) {
            $title .= ' with mapping';
        }

        if ($interval == 1) {
            $title .= ' every minute';
        } else {
            $title .= " every {$interval} minutes";
        }

        return $title;
    }

    private static function updateTitle(callable $set, callable $get)
    {
        $title = self::generateTitle($get);
        $set('title', $title);
    }

    private static function getApiUrl(?Platform $platform): ?string
    {
        return $platform ? "https://{$platform->domain}/api/core" : null;
    }

    private static function fetchModelsFromApi(string $apiUrl, Platform $platform): array
    {
        try {
            $response = Http::get($apiUrl);

            if ($response->failed()) {
                Notification::make()
                    ->title('API Error')
                    ->body(__('An error occurred while fetching the models from platform: ').$platform->name.' ('.$platform->domain.')')
                    ->danger()
                    ->send();

                return [];
            }

            $data = $response->json();
            $options = [];

            foreach ($data['packages'] as $package => $packageData) {
                if (! empty($packageData['models'])) {
                    foreach ($packageData['models'] as $modelName => $modelData) {
                        $package = str_replace('Moox', '', str_replace(' ', '', ucwords(str_replace('_', ' ', $packageData['package']))));
                        $options["{$packageData['package']} - {$modelName}"] = "Moox\\{$package}\\Models\\{$modelName}";
                    }
                }
            }

            return array_flip($options);

        } catch (\Exception $e) {
            Notification::make()
                ->title('API Error')
                ->body(__('An error occurred while fetching the models from platform: ').$platform->name.' ('.$platform->domain.')')
                ->danger()
                ->send();

            return [];
        }
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 0])->schema([
                    Toggle::make('status')
                        ->label(__('core::core.status'))
                        ->columnSpan(['default' => 12])
                        ->default(true)
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    Select::make('source_platform_id')
                        ->label(__('core::sync.source_platform_id'))
                        ->rules(['exists:platforms,id'])
                        ->required()
                        ->relationship('sourcePlatform', 'name')
                        ->columnSpan(['default' => 12])
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $sourceModel = $get('source_model');
                            $targetPlatformId = $get('target_platform_id');
                            $targetModel = $get('target_model');
                            if ($state === $targetPlatformId && $sourceModel === $targetModel) {
                                $set('source_platform_id', null);

                                Notification::make()
                                    ->title(__('core::sync.sync_error'))
                                    ->body(__('core::sync.sync_error_platforms'))
                                    ->danger()
                                    ->send();
                            } else {
                                self::updateTitle($set, $get);
                            }
                        }),

                    Select::make('source_model')
                        ->label(__('core::sync.source_model'))
                        ->options(function (callable $get) {
                            $sourcePlatform = Platform::find($get('source_platform_id'));
                            $apiUrl = self::getApiUrl($sourcePlatform);

                            return $apiUrl ? self::fetchModelsFromApi($apiUrl, $sourcePlatform) : [];
                        })
                        ->rules(['max:255'])
                        ->required()
                        ->reactive()
                        ->columnSpan(['default' => 12])
                        ->hint(function (callable $get) {
                            $sourcePlatform = Platform::find($get('source_platform_id'));

                            return $sourcePlatform ? new HtmlString('<a href="'.self::getApiUrl($sourcePlatform).'" target="_blank">Test API</a>') : null;
                        })
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $sourcePlatformId = $get('source_platform_id');
                            $sourceModel = $get('source_model');
                            $targetPlatformId = $get('target_platform_id');
                            $targetModel = $get('target_model');

                            if ($sourcePlatformId === $targetPlatformId && $sourceModel === $targetModel) {
                                $set('source_model', null);

                                Notification::make()
                                    ->title('Sync Error')
                                    ->body(__('You cannot sync the same platform and model as source and target.'))
                                    ->danger()
                                    ->send();
                            } else {
                                self::updateTitle($set, $get);
                                self::checkModelCompatibility($set, $get);
                            }
                        }),

                    Select::make('target_platform_id')
                        ->label(__('core::sync.target_platform_id'))
                        ->rules(['exists:platforms,id'])
                        ->required()
                        ->relationship('targetPlatform', 'name')
                        ->columnSpan(['default' => 12])
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $sourcePlatformId = $get('source_platform_id');
                            $sourceModel = $get('source_model');
                            $targetModel = $get('target_model');
                            if ($state === $sourcePlatformId && $sourceModel === $targetModel) {
                                $set('target_platform_id', null);

                                Notification::make()
                                    ->title('Sync Error')
                                    ->body(__('core::sync.sync_error_platforms'))
                                    ->danger()
                                    ->send();
                            } else {
                                self::updateTitle($set, $get);
                            }
                        }),

                    Select::make('target_model')
                        ->label(__('core::sync.target_model'))
                        ->options(function (callable $get) {
                            $targetPlatform = Platform::find($get('target_platform_id'));
                            $apiUrl = self::getApiUrl($targetPlatform);

                            return $apiUrl ? self::fetchModelsFromApi($apiUrl, $targetPlatform) : [];
                        })
                        ->rules(['max:255'])
                        ->required()
                        ->reactive()
                        ->columnSpan(['default' => 12])
                        ->hint(function (callable $get) {
                            $targetPlatform = Platform::find($get('target_platform_id'));

                            return $targetPlatform ? new HtmlString('<a href="'.self::getApiUrl($targetPlatform).'" target="_blank">Test API</a>') : null;
                        })
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $sourcePlatformId = $get('source_platform_id');
                            $sourceModel = $get('source_model');
                            $targetPlatformId = $get('target_platform_id');
                            $targetModel = $get('target_model');

                            if ($sourcePlatformId === $targetPlatformId && $sourceModel === $targetModel) {
                                $set('target_model', null);

                                Notification::make()
                                    ->title('Sync Error')
                                    ->body(__('You cannot sync the same platform and model as source and target.'))
                                    ->danger()
                                    ->send();
                            } else {
                                self::updateTitle($set, $get);
                                self::checkModelCompatibility($set, $get);
                            }
                        }),

                    TextInput::make('interval')
                        ->label(__('core::core.interval'))
                        ->rules(['integer'])
                        ->default(60)
                        ->suffix(fn ($get) => $get('interval') == 1 ? 'minute' : 'minutes')
                        ->columnSpan(['default' => 12])
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    Toggle::make('use_platform_relations')
                        ->label(__('core::sync.use_platform_relations'))
                        ->columnSpan(['default' => 12])
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    Select::make('if_exists')
                        ->label(__('core::sync.if_exists'))
                        ->options([
                            'update' => 'Update',
                            'skip' => 'Skip',
                            'error' => 'Error',
                        ])
                        ->required()
                        ->default('update')
                        ->columnSpan(['default' => 12]),

                    Select::make('filter_ids')
                        ->label(__('core::sync.filter_ids'))
                        ->options([
                            'sync_all_records' => 'Sync all records',
                            'sync_only_ids' => 'Sync these IDs only',
                            'ignore_ids' => 'Specify IDs to ignore',
                        ])
                        ->columnSpan(['default' => 12])
                        ->default('sync_all_records')
                        ->label(__('core::sync.sync_all_records'))
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    TextInput::make('sync_only_ids')
                        ->label(__('core::sync.sync_only_ids'))
                        ->rules(['array'])
                        ->columnSpan(['default' => 12])
                        ->visible(fn ($get) => $get('filter_ids') === 'sync_only_ids')
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    TextInput::make('ignore_ids')
                        ->label(__('core::sync.ingnore_ids'))
                        ->rules(['array'])
                        ->columnSpan(['default' => 12])
                        ->visible(fn ($get) => $get('filter_ids') === 'ignore_ids')
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    Toggle::make('sync_all_fields')
                        ->label(__('core::sync.sync_all_fields'))
                        ->default(true)
                        ->columnSpan(['default' => 12])
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get))
                        ->disabled(fn ($get) => ! $get('models_compatible')),

                    KeyValue::make('field_mappings')
                        ->label(__('core::sync.field_mappings'))
                        ->rules(['array'])
                        ->columnSpan(['default' => 12])
                        ->hidden(fn ($get) => $get('sync_all_fields') && $get('models_compatible'))
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    TextInput::make('use_transformer_class')
                        ->label(__('core::sync.use_transformer_class'))
                        ->rules(['max:255'])
                        ->columnSpan(['default' => 12])
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set, callable $get) => self::updateTitle($set, $get)),

                    Toggle::make('has_errors')
                        ->label(__('core::core.has_errors'))
                        ->rules(['boolean'])
                        ->columnSpan(['default' => 12])
                        ->reactive(),

                    TextInput::make('error_message')
                        ->label(__('core::core.error_message'))
                        ->rules(['max:255'])
                        ->columnSpan(['default' => 12])
                        ->visible(fn ($get) => $get('has_errors')),

                    TextInput::make('title')
                        ->label(__('core::core.title'))
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->columnSpan(['default' => 12])
                        ->default(fn (callable $get) => SyncResource::generateTitle($get))
                        ->reactive(),

                    DatePicker::make('last_sync')
                        ->label(__('core::sync.last_sync'))
                        ->rules(['date'])
                        ->disabled()
                        ->columnSpan(['default' => 12]),

                    Hidden::make('models_compatible')
                        ->default(true),

                    Hidden::make('compatibility_error'),

                    Hidden::make('missing_columns'),

                    Hidden::make('extra_columns'),
                ]),
            ]),
        ]);
    }

    private static function checkModelCompatibility(callable $set, callable $get)
    {
        $sourceModel = $get('source_model');
        $targetModel = $get('target_model');

        if ($sourceModel && $targetModel) {
            $compatibility = ModelCompatibilityChecker::checkCompatibility($sourceModel, $targetModel);

            $set('models_compatible', $compatibility['compatible']);
            $set('compatibility_error', $compatibility['error']);
            $set('missing_columns', $compatibility['missingColumns']);
            $set('extra_columns', $compatibility['extraColumns']);

            if (! $compatibility['compatible']) {
                $set('sync_all_fields', false);

                $missingColumnsStr = implode(', ', $compatibility['missingColumns']);
                $extraColumnsStr = implode(', ', $compatibility['extraColumns']);

                Notification::make()
                    ->title('Model Compatibility Warning')
                    ->body("The selected models are not fully compatible. Missing columns: {$missingColumnsStr}. Extra columns: {$extraColumnsStr}. Please map fields manually.")
                    ->warning()
                    ->send();
            }
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                TextColumn::make('sourcePlatformAndModel')
                    ->label(__('core::sync.source_platform_and_model'))
                    ->toggleable()
                    ->getStateUsing(fn ($record) => "{$record->sourcePlatform->name} ({$record->source_model})")
                    ->limit(50),
                TextColumn::make('targetPlatformAndModel')
                    ->label(__('core::sync.target_platform_and_model'))
                    ->toggleable()
                    ->getStateUsing(fn ($record) => "{$record->targetPlatform->name} ({$record->target_model})")
                    ->limit(50),
                IconColumn::make('use_platform_relations')
                    ->label(__('core::sync.use_platform_relations'))
                    ->toggleable()
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->getStateUsing(fn ($record) => $record->use_platform_relations),
                IconColumn::make('filter_ids')
                    ->label(__('core::sync.filter_ids'))
                    ->toggleable()
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->getStateUsing(fn ($record) => empty($record->field_mappings)),
                IconColumn::make('sync_all_fields')
                    ->label(__('core::sync.sync_all_fields'))
                    ->toggleable()
                    ->boolean()
                    ->getStateUsing(fn ($record) => ! $record->sync_all_fields),
                IconColumn::make('has_errors')
                    ->label(__('core::core.has_errors'))
                    ->toggleable()
                    ->boolean(),
                TextColumn::make('last_sync')
                    ->label(__('core::sync.last_sync'))
                    ->toggleable()
                    ->date()
                    ->since(),
            ])
            ->filters([
                SelectFilter::make('source_platform_id')
                    ->label(__('core::sync.source_platform_id'))
                    ->relationship('sourcePlatform', 'name')
                    ->indicator('Platform')
                    ->multiple(),

                SelectFilter::make('target_platform_id')
                    ->label(__('core::sync.target_platform_id'))
                    ->relationship('targetPlatform', 'name')
                    ->indicator('Platform')
                    ->multiple(),
            ])
            ->actions([ViewAction::make(), EditAction::make()])
            ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSyncs::route('/'),
            'create' => CreateSync::route('/create'),
            'view' => ViewSync::route('/{record}'),
            'edit' => EditSync::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return config('sync.resources.sync.single');
    }

    public static function getPluralModelLabel(): string
    {
        return config('sync.resources.sync.plural');
    }

    public static function getNavigationLabel(): string
    {
        return config('sync.resources.sync.plural');
    }

    public static function getBreadcrumb(): string
    {
        return config('sync.resources.sync.single');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function getNavigationGroup(): ?string
    {
        return config('sync.navigation_group');
    }

    public static function getNavigationSort(): ?int
    {
        return config('sync.navigation_sort') + 1;
    }
}
