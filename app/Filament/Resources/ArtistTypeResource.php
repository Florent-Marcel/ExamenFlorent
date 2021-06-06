<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistTypeResource\RelationManagers\ShowsRelationManager;
use App\Filament\Resources\ArtistTypeResource\Pages;
use App\Filament\Resources\ArtistTypeResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ArtistTypeResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\BelongsToSelect::make('artist_id')
                    ->relationship('artist', 'lastname')
                    ->required(),
                Components\BelongsToSelect::make('type_id')
                    ->relationship('type', 'type')
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('artist.firstname')->sortable()->searchable(),
                Columns\Text::make('artist.lastname')->sortable()->searchable(),
                Columns\Text::make('type.type')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            ShowsRelationManager::class,
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListArtistTypes::routeTo('/', 'index'),
            Pages\CreateArtistType::routeTo('/create', 'create'),
            Pages\EditArtistType::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
