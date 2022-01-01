<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([

            
            [
                'id' => '10001',
                'name' => 'Admin001',
                'email' => 'admin001@leptons.com',
                'otp' => 990900,
                'email_verified_at' => now(),
                'password' =>  Hash::make('leptons2021'),
                'status' => 'verified',
                'email_verified_at' => now(),
                'role' => 'admin',
                'usercode' => 'LEP0000',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],



            [
                'id' => '10009',
                'name' => 'John Doe',
                'email' => 'user001@leptons.com',
                'otp' => 990900,
                'email_verified_at' => now(),
                'password' =>  Hash::make('leptons2021'),
                'status' => 'verified',
                'email_verified_at' => now(),
                'role' => 'user',
                'usercode' => 'LEP0009',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            
                
                
          ]);
    }
}
