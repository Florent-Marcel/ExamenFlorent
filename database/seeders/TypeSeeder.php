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
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('types')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $types = [
            ['type'=>"danseur"],
            ['type'=>"humoriste"],
            ['type'=>"jongleur"],
            ['type'=>"marionnettiste"],
            ['type'=>"musicien‎"],
            ['type'=>"prestidigitateur"],
            ['type'=>"auteur"],
            ['type'=>"scénographe"],
            ['type'=>"comédien"],
            ['type'=>"comédien"],
        ];

        DB::table('types')->insert($types);
    }
}
