<?php

namespace Moox\PressWiki\Resources;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Moox\Core\Traits\Base\BaseInResource;
use Moox\Core\Traits\Tabs\TabsInResource;
use Moox\PressWiki\Models\WpWikiLocationTopic;
use Moox\PressWiki\Resources\WpWikiLocationTopicResource\Pages;

class WpWikiLocationTopicResource extends Resource
{
    use BaseInResource, TabsInResource;

    protected static ?string $model = WpWikiLocationTopic::class;

    protected static ?string $navigationIcon = 'gmdi-location-on';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('name')
                        ->label(__('core::core.name'))
                        ->rules(['max:200', 'string'])
                        ->required()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('slug')
                        ->label(__('core::core.slug'))
                        ->rules(['max:200', 'string'])
                        ->required()
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('term_group')
                        ->label(__('core::core.term_group'))
                        ->rules(['max:255'])
                        ->required()
                        ->default('0')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('core::core.name'))
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('core::core.slug'))
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('term_group')
                    ->label(__('core::core.term_group'))
                    ->toggleable()
                    ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->actions([ViewAction::make(), EditAction::make()])
            ->bulkActions([DeleteBulkAction::make()]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWpWikiLocationTopics::route('/'),
            // 'create' => Pages\CreateWpWikiLocationTopic::route('/create'),
            // 'view' => Pages\ViewWpWikiLocationTopic::route('/{record}'),
            // 'edit' => Pages\EditWpWikiLocationTopic::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return config('press-wiki.resources.wiki-location-topic.single');
    }

    public static function getPluralModelLabel(): string
    {
        return config('press-wiki.resources.wiki-location-topic.plural');
    }

    public static function getNavigationLabel(): string
    {
        return config('press-wiki.resources.wiki-location-topic.plural');
    }

    public static function getBreadcrumb(): string
    {
        return config('press-wiki.resources.wiki-location-topic.single');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('press-wiki.temp_navigation_group');
    }

    public static function getNavigationSort(): ?int
    {
        return config('press-wiki.temp_navigation_sort') + 3;
    }
}
