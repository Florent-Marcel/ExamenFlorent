<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $troupes= [
            [
                'nom' => "test",
            ],
            [
                'nom' => "test2",
            ],

        ];

        DB::table('troupes')->insert($troupes);
    }
}
