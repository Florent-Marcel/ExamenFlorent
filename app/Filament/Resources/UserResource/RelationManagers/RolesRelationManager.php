<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class RolesRelationManager extends RelationManager
{
    public static $primaryColumn = 'role';

    public static $relationship = 'roles';

    public static function form(Form $form)
    {
        return RoleResource::form($form);
    }

    public static function table(Table $table)
    {
        return RoleResource::table($table);
    }
}
