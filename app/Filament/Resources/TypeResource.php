<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeResource\Pages;
use App\Filament\Resources\TypeResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class TypeResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('type')
                    ->autofocus()
                    ->required()
                    ->unique('types', 'type')
                    ->max(60),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('type')->sortable()->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            RelationManagers\ArtistsRelationManager::class,
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListTypes::routeTo('/', 'index'),
            Pages\CreateType::routeTo('/create', 'create'),
            Pages\EditType::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
