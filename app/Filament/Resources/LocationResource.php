<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Filament\Resources\LocationResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class LocationResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([

                Components\TextInput::make('designation')
                    ->required()
                    ->max(60)
                    ->dependable()
                    ->autofocus()
                    ->unique('locations', 'designation'),
                Components\TextInput::make('address')
                    ->max(255)
                    ->nullable(),
                Components\TextInput::make('website')
                    ->max(255)
                    ->url()
                    ->nullable(),
                Components\TextInput::make('phone')
                    ->max(255)
                    ->tel()
                    ->nullable(),
                Components\BelongsToSelect::make('locality_id')
                    ->relationship('locality', 'locality')
                    ->required()
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('designation')->sortable()->searchable(),
                Columns\Text::make('address')->sortable()->searchable(),
                Columns\Text::make('website')->sortable()->searchable(), //todo: click on url
                Columns\Text::make('phone')->sortable()->searchable(),
                Columns\Text::make('locality.postal_code')->sortable()->searchable(),
                Columns\Text::make('locality.locality')->sortable()->searchable(),
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
            Pages\ListLocations::routeTo('/', 'index'),
            Pages\CreateLocation::routeTo('/create', 'create'),
            Pages\EditLocation::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
