<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistResource\Pages;
use App\Filament\Resources\ArtistResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Columns\Column;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ArtistResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('firstname')
                    ->autofocus()
                    ->required()
                    ->max(60),
                Components\TextInput::make('lastname')
                    ->autofocus()
                    ->required()
                    ->max(60),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('firstname')->sortable()->searchable(),
                Columns\Text::make('lastname')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListArtists::routeTo('/', 'index'),
            Pages\CreateArtist::routeTo('/create', 'create'),
            Pages\EditArtist::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
