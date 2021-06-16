<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShowResource\Pages;
use App\Filament\Resources\ShowResource\RelationManagers;
use App\Filament\Resources\ShowResource\RelationManagers\ArtistsRelationManager;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ShowResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('title')
                    ->required()
                    ->max(255)
                    ->autofocus(),
                Components\Checkbox::make('bookable'),
                Components\TextInput::make('poster_url')
                    ->nullable()
                    ->max(255),
                Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->extraAttributes(["step" => "0.01"])
                    ->prefix('€'),
                Components\BelongsToSelect::make('location_id')
                    ->nullable()
                    ->relationship('location', 'designation'),
                Components\RichEditor::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('title')->sortable()->searchable(),
                Columns\Text::make('description')->sortable()->searchable()->limit(50),
                Columns\Text::make('poster_url')->sortable()->searchable(),
                Columns\Text::make('location.designation')->sortable()->searchable(),
                Columns\Boolean::make('bookable')->sortable()->searchable(),
                Columns\Text::make('price')->sortable()->searchable()->currency('€', ',', '.'),
            ])
            ->filters([
                Filter::make('Bookable', fn($query) => $query->where('bookable', '1')),
                Filter::make('Not bookable', fn($query) => $query->where('bookable', '0')),
                Filter::make('Know location', fn($query) => $query->where('location_id', '>', 0)),
                Filter::make('Unknow location', fn($query) => $query->where('location_id', null)),
            ]);
    }

    public static function relations()
    {
        return [
            ArtistsRelationManager::class,
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListShows::routeTo('/', 'index'),
            Pages\CreateShow::routeTo('/create', 'create'),
            Pages\EditShow::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
