<?php

namespace App\Filament\Resources\ShowResource\Pages;

use App\Filament\Resources\ShowResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditShow extends EditRecord
{
    public static $resource = ShowResource::class;

    protected function beforeSave()
    {
        $this->record->slug = Str::slug($this->record->title);
    }
}
