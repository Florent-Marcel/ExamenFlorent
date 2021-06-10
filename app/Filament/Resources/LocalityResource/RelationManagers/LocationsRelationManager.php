<?php

namespace App\Filament\Resources\LocalityResource\RelationManagers;

use App\Filament\Resources\LocationResource;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class LocationsRelationManager extends RelationManager
{
    public static $primaryColumn = 'id';

    public static $relationship = 'locations';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                LocationResource::form($form)
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('postal_code')->sortable()->searchable(),
                Columns\Text::make('locality')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }
}
