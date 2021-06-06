<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocalityResource\Pages;
use App\Filament\Resources\LocalityResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class LocalityResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('postal_code')
                    ->autofocus()
                    ->required()
                    ->max(6),
                Components\TextInput::make('locality')
                    ->autofocus()
                    ->required()
                    ->unique('localities', 'locality')
                    ->max(60),
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
                //exemple de filtre
                //Filter::make('8713', fn($query) => $query->where('postal_code', '8713'))
            ]);
    }

    public static function relations()
    {
        return [
            //Components\BelongsToSelect::make('locality_id')
              //  ->relationship('locality', 'designation')
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListLocalities::routeTo('/', 'index'),
            Pages\CreateLocality::routeTo('/create', 'create'),
            Pages\EditLocality::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
