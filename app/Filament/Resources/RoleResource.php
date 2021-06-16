<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Filament\Resources\RoleResource\RelationManagers\UsersRelationManager;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Columns\Column;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class RoleResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('role')
                    ->unique('roles', 'role', true)
                    ->max(30)
                    ->required()
                    ->autofocus(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('role')->searchable()->sortable()
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListRoles::routeTo('/', 'index'),
            Pages\CreateRole::routeTo('/create', 'create'),
            Pages\EditRole::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
