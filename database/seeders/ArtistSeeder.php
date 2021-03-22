<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::factory()->count(10)->create();
    }
}
