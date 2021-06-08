<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateLocation extends CreateRecord
{
    public static $resource = LocationResource::class;

    protected function beforeCreate()
    {
        $this->record['slug'] = Str::slug($this->record['designation']);
    }
}
