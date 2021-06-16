<?php

namespace App\Filament\Resources\ArtistResource\Pages;

use App\Filament\Resources\ArtistResource;
use Filament\Resources\Pages\ListRecords;

class ListArtists extends ListRecords
{
    public static $resource = ArtistResource::class;
}
