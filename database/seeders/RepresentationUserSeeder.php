<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Representation;
use App\Models\Location;
use App\Models\Show;

class RepresentationUserSeeder extends Seeder
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
        DB::table('representation_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $representationUsers =[
            [
                'user_login'=>'Florent',
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=>'ayiyi',
                'representation_when'=>'2012-10-12 13:30:00',
                'places'=>300
            ],
            [
                'user_login'=>'Patrice',
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'ayiyi',
                'representation_when'=>'2012-10-12 20:30:00',
                'places'=>250
            ]
            ];

        //Prepare the data
        foreach ($representationUsers as &$data){
            //search the user for a given username
            $user = User::where([
                ['login','=',$data['user_login']]
            ])->first();

            $location = Location::where([
                ['slug','=',$data['location_slug']]
            ])->first();

            $show = Show::where([
                ['slug','=',$data['show_slug']]
            ])->first();

            $representation = Representation::where([
                ['location_id','=',$location->id],
                ['show_id','=',$show->id],
                ['when','=',$data['representation_when']]
            ])->first();

            unset($data['user_login']);
            unset($data['location_slug']);
            unset($data['show_slug']);
            unset($data['representation_when']);

            $data['user_id'] = $user->id;

            $data['representation_id'] = $representation->id;

        }
        unset($data);

        DB::table('representation_user')->insert($representationUsers);

    }
}
