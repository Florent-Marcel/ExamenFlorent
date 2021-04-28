<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $types = Type::all();

        Artist::all()->each(function ($artist) use ($types){
            $artist->types()->attach(
                $types->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
