<?php

namespace Moox\Press\Resources\WpTermRelationshipResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Moox\Core\Traits\HasDynamicTabs;
use Moox\Press\Models\WpTermRelationship;
use Moox\Press\Resources\WpTermRelationshipResource;

class ListWpTermRelationships extends ListRecords
{
    use HasDynamicTabs;

    protected static string $resource = WpTermRelationshipResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }

    public function getTabs(): array
    {
        return $this->getDynamicTabs('press.resources.termRelationships.tabs', WpTermRelationship::class);
    }
}
