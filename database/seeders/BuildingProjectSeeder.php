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
                'title' => 'THE OAK',
                'location' => 'Asokoro, ABUJA',
                'apartment_size' => '480 m²',
                'payment_plan' => '30% | 20% | 20% | 20% | 10%',
                'property_price' => '220',
                'facilities' => '5 Bedroom Semi-detached Duplex, A Room  BQ,Family Lounge, Solar Powered Inverter, Foyer, Automated Gate and door Access control, CCTV Surveillance, Walking In Closet, Front and Back Lawns,Internet,Private Gym,Cinema,Lift & Sit Out',
                'estate_facilities' => '',
                'duration' => ''

            ],

            [
                'title' => 'LEPTONS MARIGOLD 5',
                'location' => 'Lifecamp, ABUJA',
                'apartment_size' => '424 m²',
                'payment_plan' => '30% | 20% | 20% | 20% | 10%',
                'property_price' => '140',
                'facilities' => '5 Bedroom Semidetached duplex, A Room  BQ, 2 Living Rooms, Solar Powered Inverter, 4 Parking per Apartment, Fully fitted kitchen, Walk Inn Closet,1Sauna/Steam Room, Front and Back Lawns,Internet,Home office,Ante Room,Cinema/Gaming room,Individual compound,Recreation & Sport,Cctv (Optional),Elevator (Optional),Private  Swimming Pool(Optional),Individual  Compound,',
                'estate_facilities' => 'Home Automation,Automated  gate access,24 Hours electricity,Internet infrastructure,Recreation & Sport,',
                'duration' => '12'

            ],


        ]);


    }
}



