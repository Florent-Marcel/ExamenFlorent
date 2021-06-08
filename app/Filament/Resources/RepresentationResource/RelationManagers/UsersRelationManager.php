<?php

namespace App\Filament\Resources\RepresentationResource\RelationManagers;

use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use Filament\Resources\UserResource;

class UsersRelationManager extends RelationManager
{
    public static $primaryColumn = 'login';

    public static $relationship = 'users';

    public static function form(Form $form)
    {
        return UserResource::form($form);
    }

    public static function table(Table $table)
    {
        return UserResource::table($table);
    }
}
