<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepresentationResource\Pages;
use App\Filament\Resources\RepresentationResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class RepresentationResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\BelongsToSelect::make('show_id')
                    ->relationship('show', 'title'),
                Components\BelongsToSelect::make('show_id')
                    ->relationship('show', 'title')

            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('show.title')->sortable()->searchable(),
                Columns\Text::make('location.designation')->sortable()->searchable(),
                Columns\Text::make('when')->sortable()->searchable(),
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
            Pages\ListRepresentations::routeTo('/', 'index'),
            Pages\CreateRepresentation::routeTo('/create', 'create'),
            Pages\EditRepresentation::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
