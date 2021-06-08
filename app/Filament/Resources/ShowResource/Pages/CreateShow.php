<?php

namespace App\Filament\Resources\ShowResource\Pages;

use App\Filament\Resources\ShowResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateShow extends CreateRecord
{
    public static $resource = ShowResource::class;

    protected function beforeCreate()
    {
        $this->record['slug'] = Str::slug($this->record['title']);
    }
}
