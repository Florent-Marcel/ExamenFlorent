<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Ajout B
use App\Models\Reservation; // Ajout B
use App\Models\User;
use App\Models\Representation;
use App\Models\Location;
use App\Models\Show;
use Illuminate\Support\Facades\Hash;

class ReservationSeeder extends Seeder // Ajout B
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // Ajout B
        DB::table('reservations')->truncate();       // Ajout B
        DB::statement('SET FOREIGN_KEY_CHECKS=1');  // Ajout B


        $reservations = [
            [
                'user_email'=>'admin@admin.be',
                'location_slug'=>'Espace-Delvaux-La-Vènerie',
                'show_slug'=>'Ayiyi',
                'when'=>'2012-10-12 13:30',
                'places'=>220
            ],

            [
                'user_email'=>'flo.marcel@hotmail.com',
                'location_slug'=>'Espace-Delvaux-La-Vènerie',
                'show_slug'=>'Ayiyi',
                'when'=>'2012-10-12 13:30',
                'places'=>221
            ],
            [
                'user_email'=>'patrice.verstichel@gmail.com',
                'location_slug'=>'Dexia-Art-Center',
                'show_slug'=>'Ayiyi',
                'when'=>'2012-10-12 20:30',
                'places'=>222
            ]
        ];

        foreach($reservations as &$data){
            $location = Location::firstWhere('slug', $data['location_slug']);
            unset($data['location_slug']);

            $show = Show::firstWhere('slug', $data['show_slug']);
            unset($data['show_slug']);




            $representation = Representation::where([
                ['show_id', $show->id],
                ['location_id', $location->id],
                ['when', $data['when'] ],
            ])->first();
                unset($data['when']);

            $user = User::firstWhere('email', $data['user_email']);
            unset($data['user_email']);


            $data['representation_id'] = $representation->id;
            $data['user_id'] = $user->id;
            }
            DB::table('reservations')->insert($reservations);
    }

}
