<?php

namespace Moox\Press\Resources\WpMediaResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Moox\Core\Traits\HasDynamicTabs;
use Moox\Press\Models\WpMedia;
use Moox\Press\Resources\WpMediaResource;

class ListWpPosts extends ListRecords
{
    use HasDynamicTabs;

    protected static string $resource = WpMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }

    public function getTabs(): array
    {
        return $this->getDynamicTabs('press.resources.media.tabs', WpMedia::class);
    }
}
