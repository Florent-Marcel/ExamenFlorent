<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    public static $resource = UserResource::class;

    protected function beforeSave()
    {
        $this->record->password = password_hash($this->record->password, PASSWORD_DEFAULT);
    }

}
