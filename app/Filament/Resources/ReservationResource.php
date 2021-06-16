<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Columns\Column;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ReservationResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\BelongsToSelect::make('user_id')
                    ->relationship('user', 'login')
                    ->required(),
                Components\BelongsToSelect::make('representation_id')
                    ->relationship('representation', 'id')
                    ->required(),
                Components\TextInput::make('places')
                    ->numeric()
                    ->min(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('user.login')->searchable()->sortable(),
                Columns\Text::make('representation.show.title')->searchable()->sortable(),
                Columns\Text::make('representation.show.location.designation')->searchable()->sortable(),
                Columns\Text::make('representation.when')->searchable()->sortable(),
                Columns\Text::make('places')->searchable()->sortable(),
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
            Pages\ListReservations::routeTo('/', 'index'),
            Pages\CreateReservation::routeTo('/create', 'create'),
            Pages\EditReservation::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
