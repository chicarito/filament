<?php

namespace App\Filament\Resources\NilaiCategoryResource\Pages;

use App\Filament\Resources\NilaiCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNilaiCategories extends ManageRecords
{
    protected static string $resource = NilaiCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string
    {
        return 'Kategori Nilai';
    }
}
