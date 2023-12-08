<?php

namespace Moox\File\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Moox\File\FilePlugin;
use Moox\File\Models\File;
use Moox\File\Resources\FileResource\Pages\ListPage;
use Moox\File\Resources\FileResource\Widgets\FileWidgets;

class FileResource extends Resource
{
    protected static ?string $model = File::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(255),
                DateTimePicker::make('started_at'),
                DateTimePicker::make('finished_at'),
                Toggle::make('failed')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('file::translations.name'))
                    ->sortable(),
                TextColumn::make('started_at')
                    ->label(__('file::translations.started_at'))
                    ->since()
                    ->sortable(),
                TextColumn::make('failed')
                    ->label(__('file::translations.failed'))
                    ->sortable(),
            ])
            ->defaultSort('name', 'desc')
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
            FileWidgets::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return FilePlugin::get()->getNavigationCountBadge() ? number_format(static::getModel()::count()) : null;
    }

    public static function getModelLabel(): string
    {
        return FilePlugin::get()->getLabel();
    }

    public static function getPluralModelLabel(): string
    {
        return FilePlugin::get()->getPluralLabel();
    }

    public static function getNavigationLabel(): string
    {
        return Str::title(static::getPluralModelLabel()) ?? Str::title(static::getModelLabel());
    }

    public static function getNavigationGroup(): ?string
    {
        return FilePlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return FilePlugin::get()->getNavigationSort();
    }

    public static function getBreadcrumb(): string
    {
        return FilePlugin::get()->getBreadcrumb();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return FilePlugin::get()->shouldRegisterNavigation();
    }

    public static function getNavigationIcon(): string
    {
        return FilePlugin::get()->getNavigationIcon();
    }
}
