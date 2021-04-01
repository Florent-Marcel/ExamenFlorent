<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('types')->truncate();

        $types = [
            ['type'=>"Danseur"],
            ['type'=>"Humoriste"],
            ['type'=>"Jongleur"],
            ['type'=>"Marionnettiste"],
            ['type'=>"Musicien‎"],
            ['type'=>"Prestidigitateur"]
        ];

        DB::table('types')->insert($types);
    }
}
