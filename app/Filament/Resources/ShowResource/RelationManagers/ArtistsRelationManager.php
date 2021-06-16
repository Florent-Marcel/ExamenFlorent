<?php

namespace App\Filament\Resources\ShowResource\RelationManagers;

use App\Filament\Resources\ArtistResource;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ArtistsRelationManager extends RelationManager
{
    public static $primaryColumn = 'id';

    public static $relationship = 'artisttypes';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\BelongsToSelect::make('artist_id')
                    ->relationship('artist', 'lastname')
                    ->preload()
                    ->autofocus()
                    ->required(),
                Components\BelongsToSelect::make('type_id')
                    ->relationship('type', 'type')
                    ->preload()
                    //->unique('artist_type', 'artist_type_id')
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
}
