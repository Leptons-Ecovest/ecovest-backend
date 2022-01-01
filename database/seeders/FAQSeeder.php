<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('f_a_q_s')->insertOrIgnore([

            [
                'category' => 'Payment',
                'question' => '',
                'answer' => ''
            ],


        ]);
    }
}
