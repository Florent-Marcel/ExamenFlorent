<?php

namespace App\Filament\Resources\TypeResource\RelationManagers;

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

    public static $relationship = 'artists';

    public static function form(Form $form)
    {
        return ArtistResource::form($form);
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
}
