<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Role;

class UserRoleSeeder extends Seeder
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
        DB::table('user_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //define data
        $userRoles = [
            [
                'user_login'=>'Admin',
                'role'=>'admin',
            ],
            [
                'user_login'=>'Patrice',
                'role'=>'member',
            ],
            [
                'user_login'=>'Patrice',
                'role'=>'affiliate',
            ],

            [
                'user_login'=>'Florent',
                'role'=>'affiliate',
            ],
            [
                'user_login'=>'Florent',
                'role'=>'member',
            ],
        ];

        //prepare the data
        foreach ($userRoles as &$data) {
            //search the user for a given username
            $user = User::where([
                ['login','=',$data['user_login']]
                ])->first();

            //search the role for a given role
            $role = Role::firstWhere('role',$data['role']);

            unset($data['user_login']);
            unset($data['role']);

            $data['user_id'] = $user -> id;
            $data['role_id'] = $role -> id;

        }
        unset($data);
        //insert data in tables
        DB::table('user_role')->insert($userRoles);

    }
}
