<?php

namespace App\Filament\Resources\ArtistTypeResource\RelationManagers;

use App\Filament\Resources\ShowResource;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ShowsRelationManager extends RelationManager
{
    public static $primaryColumn = 'slug';

    public static $relationship = 'shows';

    public static function form(Form $form)
    {
        return ShowResource::form($form);
    }

    public static function table(Table $table)
    {
        return ShowResource::table($table);
    }
}
