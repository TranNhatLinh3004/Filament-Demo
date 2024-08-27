<?php

namespace App\Filament\Resources\Blog\CategoryResource\Pages;

use App\Filament\Resources\Blog\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
// use App\Filament\Imports\Blog\CategoryImporter;
class ManageCategories extends ManageRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\ImportAction::make(),
            // ->importer(CategoryImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
