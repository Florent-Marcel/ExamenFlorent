<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    public static $resource = UserResource::class;

    protected function beforeCreate()
    {
        $this->record['password'] = password_hash($this->record['password'], PASSWORD_DEFAULT);
    }
}
