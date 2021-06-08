<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class UserResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('login')
                    ->max('30')
                    ->required()
                    ->unique('users', 'login', true)
                    ->autofocus(),
                Components\TextInput::make('password')
                    ->max('255')
                    ->required()
                    ->min(8)
                    ->password(),
                Components\TextInput::make('firstname')
                    ->max('60')
                    ->required(),
                Components\TextInput::make('lastname')
                    ->max('60')
                    ->required(),
                Components\TextInput::make('email')
                    ->max('100')
                    ->email()
                    ->required(),
                Components\TextInput::make('langue')
                    ->max('2')
                    ->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('login')->searchable()->sortable(),
                Columns\Text::make('firstname')->searchable()->sortable(),
                Columns\Text::make('lastname')->searchable()->sortable(),
                Columns\Text::make('email')->searchable()->sortable(),
                Columns\Text::make('langue')->searchable()->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            RolesRelationManager::class
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListUsers::routeTo('/', 'index'),
            Pages\CreateUser::routeTo('/create', 'create'),
            Pages\EditUser::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
