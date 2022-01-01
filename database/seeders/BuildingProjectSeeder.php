<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class BuildingProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('building_projects')->insertOrIgnore([

            [
                'title' => 'Bungalow',
                'description' => '3 Bedroom Bungalow'


            ]
        ]);


    }
}
