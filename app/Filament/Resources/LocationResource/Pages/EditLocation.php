<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditLocation extends EditRecord
{
    public static $resource = LocationResource::class;

    protected function beforeSave()
    {
        $this->record->slug = Str::slug($this->record->designation);
    }
}
