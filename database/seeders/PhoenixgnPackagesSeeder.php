<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class PhoenixgnPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('packages')->insertOrIgnore([ 
            [  

                
                'reg_fee' => '25000',
                'grade' => 6,
                'points' => '600',
                'dr_commission' => '45000',
                'second_indr_commission' => '15000',
                'third_indr_commission' => '10500',
                'three_one_commission' => '10',
                'match_bonus' => '9000',
                'max_daily_matching' => '30',
                'featured_logo' => 'family_package.png',
                'title' => 'Family Package',
                'description' => 'Family Package gives you the opportunity to benefit in all rewards and incentives in Phoenix Compensation Plan.',
                
                ],
            [  

                
                'reg_fee' => '250000',
                'grade' => 5,
                'points' => '500',
                'dr_commission' => '50000',
                'second_indr_commission' => '25000',
                'third_indr_commission' => '12500',
                'three_one_commission' => '10',
                'match_bonus' => '7500',
                'max_daily_matching' => '20',
                'featured_logo' => 'diamond_package.png',
                'title' => 'Diamond Package',
                'description' => 'Diamond Package gives you the opportunity to benefit in all rewards and incentives in Phoenix Compensation Plan.',
                
    
    
                ],
    
                [  
                    
                    
                    'reg_fee' => '100000',
                    'grade' => 4,
                    'points' => '400',
                    'dr_commission' => '20000',
                    'second_indr_commission' => '10000',
                    'third_indr_commission' => '5000',
                    'three_one_commission' => '10',
                    'match_bonus' => '6000',
                    'max_daily_matching' => '15',
                    'featured_logo' => 'gold_package.png',
                    'title' => 'Gold Package',
                    'description' => 'Gold Package gives you the opportunity to earn rewards and benefit in 7 ways in Phoenix Compensation Plan.',
                    
        
        
                ],
    
                [  
                    
                    
                    'reg_fee' => '50000',
                    'grade' => 3,
                    'points' => '300',
                    'dr_commission' => '10000',
                    'second_indr_commission' => '5000',
                    'third_indr_commission' => '2500',
                    'three_one_commission' => '10',
                    'match_bonus' => '4500',
                    'max_daily_matching' => '13',
                    'featured_logo' => 'ruby_package.png',
                    'title' => 'Ruby Package',
                    'description' => 'Ruby Package gives you the opportunity to earn rewards and benefit in 6 ways in Phoenix Compensation Plan.',
                    
        
        
                ],
    
                [  
                    
                    
                    'reg_fee' => '30000',
                    'grade' => 2,
                    'points' => '200',
                    'dr_commission' => '6000',
                    'second_indr_commission' => '3000',
                    'third_indr_commission' => '1500',
                    'three_one_commission' => '10',
                    'match_bonus' => '3000',
                    'max_daily_matching' => '12',
                    'featured_logo' => 'sapphire_package.png',
                    'title' => 'Sapphire Package',
                    'description' => 'Sapphire Package gives you the opportunity to earn rewards and benefit in 5 ways in Phoenix Compensation Plan.',
                    
        
        
                ],
    
                [  
                    
                    
                    'reg_fee' => '10000',
                    'grade' => 1,
                    'points' => '100',
                    'dr_commission' => '2000',
                    'second_indr_commission' => '1000',
                    'third_indr_commission' => '500',
                    'three_one_commission' => '10',
                    'match_bonus' => '1500',
                    'max_daily_matching' => '10',
                    'featured_logo' => 'emerald_package.png',
                    'title' => 'Emerald Package',
                    'description' => 'Emerald Package gives you the opportunity to earn rewards and benefit in 4 ways in Phoenix Compensation Plan.',
                    
        
        
                ],
        ]);


    }
}
