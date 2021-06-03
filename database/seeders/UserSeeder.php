<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $users = [
            [
                'login'=>'Admin',
                'password'=> Hash::make(123456789),
                'firstname'=>'AdminFirstname',
                'lastname'=>'AdminLastname',
                'name'=>'AdminName',
                'email'=>'admin@admin.be',
                'langue'=>'fr',
            ],
            [
                'login'=>'Patrice',
                'password'=> Hash::make(123456789),
                'firstname'=>'Patrice',
                'lastname'=>'Verstichel',
                'name'=>'PatriceVerstichel',
                'email'=>'patrice.verstichel@gmail.com',
                'langue'=>'fr',
            ],
            [
                'login'=>'Florent',
                'password'=> Hash::make(123456789),
                'firstname'=>'Florent',
                'lastname'=>'Marcel',
                'name'=>'FlorentMarcel',
                'email'=>'flo.marcel@hotmail.com',
                'langue'=>'fr',
            ]
            ];
        DB::table('users')->insert($users);
    }
}
