<?php

namespace Moox\Passkey\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Config;
use Moox\Passkey\Models\Passkey;
use Moox\Passkey\Resources\PasskeyResource\Pages\ListPage;
use Moox\Passkey\Resources\PasskeyResource\Widgets\PasskeyWidgets;

class PasskeyResource extends Resource
{
    protected static ?string $model = Passkey::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label(__('passkey::translations.name'))
                    ->maxLength(255)
                    ->required()
                    ->columnSpan(2),
                Textarea::make('credential_id')
                    ->label(__('passkey::translations.credential_id'))
                    ->required(),
                Textarea::make('public_key')
                    ->label(__('passkey::translations.public_key'))
                    ->required(),
                Select::make('user_type')
                    ->options(function () {
                        $models = Config::get('login-link.user_models', []);

                        return array_flip($models);
                    })
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('user_id', null);
                    })
                    ->required(),
                Select::make('user_id')
                    ->options(function ($get) {
                        $userType = $get('user_type');
                        if (! $userType) {
                            return [];
                        }

                        return $userType::query()->pluck('name', 'id')->toArray();
                    })
                    ->required(),
                Select::make('device_id')
                    ->label(__('passkey::translations.device'))

                    ->relationship('userDevice', 'title'),
                Select::make('session_id')
                    ->label(__('passkey::translations.session'))

                    ->string()
                    ->relationship('userSession', 'id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('passkey::translations.name'))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('passkey::translations.created_at'))
                    ->since()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label(__('passkey::translations.updated_at'))
                    ->since()
                    ->sortable(),
                TextColumn::make('user_type')
                    ->label(__('passkey::translations.user_type'))
                    ->sortable(),
                TextColumn::make('user_id')
                    ->label(__('passkey::translations.username'))
                    ->getStateUsing(function ($record) {
                        return optional($record->user)->name ?? 'unknown';
                    })
                    ->sortable(),
                TextColumn::make('device_id')
                    ->label(__('passkey::translations.device'))
                    ->sortable(),
                TextColumn::make('session_id')
                    ->label(__('passkey::translations.session'))
                    ->sortable(),
            ])
            ->defaultSort('title', 'desc')
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPage::route('/'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            //PasskeyWidgets::class,
        ];
    }

    public static function getModelLabel(): string
    {
        return __('passkey::translations.single');
    }

    public static function getPluralModelLabel(): string
    {
        return __('passkey::translations.plural');
    }

    public static function getNavigationLabel(): string
    {
        return __('passkey::translations.navigation_label');
    }

    public static function getBreadcrumb(): string
    {
        return __('passkey::translations.breadcrumb');
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
        return __('passkey::translations.navigation_group');
    }

    public static function getNavigationSort(): ?int
    {
        return config('passkey.navigation_sort');
    }
}
