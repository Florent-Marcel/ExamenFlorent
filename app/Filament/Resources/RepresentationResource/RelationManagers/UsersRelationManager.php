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
        return $form
            ->schema([
                // On empèche la modification des utilisateurs via la relation, car le hook de UserResource n'est pas appellé pour hashé le mot de passe.
            ]);
        //return UserResource::form($form);
    }

    public static function table(Table $table)
    {
        return UserResource::table($table);
    }
}
