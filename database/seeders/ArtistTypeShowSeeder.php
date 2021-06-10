<?php

namespace Database\Seeders;

use App\Models\ArtistType;
use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistTypeShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type_show')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $shows = Show::all();

        ArtistType::all()->each(function ($artistType) use ($shows){
            $artistType->shows()->attach(
                $shows->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
        //
    }
}
