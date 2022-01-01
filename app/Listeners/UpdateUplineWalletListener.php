<?php

namespace App\Listeners;

use App\Events\RewardUplineEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\DirectReferral;
use App\Models\IndirectReferral;
use App\Models\ThreeInOne;
use App\Models\Notification;

use Carbon\Carbon;

class UpdateUplineWalletListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RewardUplineEvent  $event
     * @return void
     */
    public function handle(RewardUplineEvent $event)
    {
        //

        $user = $event->user;

        $package = $event->package;

        $upline_data = DirectReferral::with('referrer')->where('referree_id', $user->id)->first();


        // reward direct referral

        if (!$upline_data->referrer_bonus) {
            # code...
            $upline_data->update([
                'referrer_bonus' => $package->dr_commission
            ]);
    
            $upline_wallet = UserWallet::create([
                'user_id' => $upline_data->referrer_id,
                'amount' => $package->dr_commission,
                'type' => 'credit',
                'description' => 'Direct Referral Commission'
            ]);
    
            $notification = Notification::create([
                'performed_by' => $upline_data->referrer_id,
                'title' => "New Member",
                'log' => $user->email.' just purchased '.$package->title .'.'
            ]);

            $notification = Notification::create([
                'performed_by' => $upline_data->referrer_id,
                'title' => "Direct Referral Bonus",
                'log' => 'You have been credited with ₦'.number_format($package->dr_commission, 2) 
            ]);

            // check indirect referral for upline for that week

                // reward indirect referral 2nd generation
                $upline_upline_data = DirectReferral::with('referrer')->where('referree_id', $upline_data->referrer->id)->first();

                if ($upline_upline_data) {
                    # code...

                    $upline_upline_data->update([
                        'referrer_bonus' => $package->second_indr_commission
                    ]);

                    $upline_upline_wallet = UserWallet::create([
                        'user_id' => $upline_upline_data->referrer_id,
                        'amount' => $package->second_indr_commission,
                        'type' => 'credit',
                        'description' => 'Indirect Referral Commission'
                    ]);
            
                    $notification = Notification::create([
                        'performed_by' => $upline_upline_data->referrer_id,
                        'title' => "New 2nd Generation Member",
                        'log' => $user->email.' just purchased '.$package->title .'.'
                    ]);

                    $notification = Notification::create([
                        'performed_by' => $upline_upline_data->referrer_id,
                        'title' => "Indirect Referral Bonus",
                        'log' => 'You have been credited with ₦'.number_format($package->second_indr_commission, 2) 
                    ]);


                }

                // reward indirect referral 3rd generation
                $upline_upline_upline_data = DirectReferral::with('referrer')->where('referree_id', $upline_upline_data->referrer->id)->first();

                if ($upline_upline_upline_data) {
                    # code...

                    $upline_upline_upline_data->update([
                        'referrer_bonus' => $package->third_indr_commission
                    ]);

                    $upline_upline_upline_wallet = UserWallet::create([
                        'user_id' => $upline_upline_upline_data->referrer_id,
                        'amount' => $package->third_indr_commission,
                        'type' => 'credit',
                        'description' => 'Indirect Referral Commission'
                    ]);
            
                    $notification = Notification::create([
                        'performed_by' => $upline_upline_upline_data->referrer_id,
                        'title' => "New 3rd Generation Member",
                        'log' => $user->email.' just purchased '.$package->title .'.'
                    ]);

                    $notification = Notification::create([
                        'performed_by' => $upline_upline_upline_data->referrer_id,
                        'title' => "Indirect Referral Bonus",
                        'log' => 'You have been credited with ₦'.number_format($package->third_indr_commission, 2) 
                    ]);


                }



                // reward 3 in 1 commission
                $three_in_one = ThreeInOne::
                where('user_id', $upline_data->referre_id)
                ->where('week_no', Carbon::now()->weekOfYear)->first();

                // return $indirect_reward;

                if (!$three_in_one) {
                    # code...
                    // check if there have been 3 direct referral that week

                    $direct_referral_count_of_week = DirectReferral::
                    where('referrer_id', $upline_data->referrer_id)
                    ->where('weekInYear', Carbon::now()->weekOfYear)
                    ->count();


                    return Carbon::now()->weekOfYear;

                        if ($direct_referral_count_of_week >= 3) {
                            # code...



                            ThreeInOne::create([
                                'user_id' => $upline_data->referrer_id,
                                'week_no' => Carbon::now()->weekOfYear,
                                'indirect_bonus' => 0.01 * $package->reg_fee
                            ]);


                            $up_wallet = UserWallet::create([
                                'user_id' => $upline_data->referrer_id,
                                'amount' => 0.01 * $package->reg_fee,
                                'type' => 'credit',
                                'description' => '3 in 1 Commission'
                            ]);
            
            
            
                            $notification = Notification::create([
                                'performed_by' => $upline_data->referrer_id,
                                'title' => "New Member",
                                'log' => $user->email.' just purchased '.$package->title .'.'
                            ]);
                        }


                }

        }





        return $week_no = Carbon::now()->weekOfYear;
    }
}
