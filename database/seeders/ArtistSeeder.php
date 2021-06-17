<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Troupe;
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
                'nomTroupe' => 'test',
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


        foreach($artists as &$data){
            $troupe = Troupe::firstWhere('nom', '=', $data['nomTroupe']);
            unset($data['nomTroupe']);

            if($troupe != null){
                $data['trouoe_id'] = $troupe->id;  //troupe_id
            }


        }
        unset($data);

        DB::table('artists')->insert($artists);
    }
}
