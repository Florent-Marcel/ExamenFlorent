<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('artists')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        Artist::factory()->count(13)->create();

        $artists = [
            [
                'firstname' => 'Daniel',
                'lastname' => 'Marcelin',
            ],
            [
                'firstname' => 'Philippe',
                'lastname' => 'Laurent',
            ],
            [
                'firstname' => 'Marius',
                'lastname' => 'Von Mayenburg',
            ],
            [
                'firstname' => 'Anne Marie',
                'lastname' => 'Loop',
            ],
            [
                'firstname' => 'Pietro',
                'lastname' => 'Varasso',
            ],
            [
                'firstname' => 'Laurent',
                'lastname' => 'Caron',
            ],
            [
                'firstname' => 'Élena',
                'lastname' => 'Perez',
            ],
            [
                'firstname' => 'Guillaume',
                'lastname' => 'Alexandre',
            ],
            [
                'firstname' => 'Claude',
                'lastname' => 'Semal',
            ],
            [
                'firstname' => 'Laurence',
                'lastname' => 'Warin',
            ],
            [
                'firstname' => 'Pierre',
                'lastname' => 'Wayburn',
            ],
            [
                'firstname' => 'Gwendoline',
                'lastname' => 'Gauthier',
            ],
        ];

        DB::table('artists')->insert($artists);
    }
}
