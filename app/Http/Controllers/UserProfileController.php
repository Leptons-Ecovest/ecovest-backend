<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserProfile;

use App\Models\User;

use Illuminate\Support\Facades\Mail;

use App\Mail\Welcome;

use App\Mail\EmailVerification;

use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    //



    public function get_profiles(Request $request)
    {
        # code...

      

        if ($request->user()->role == 'user') {
            # code...

            $profile = User::with('profile')->where('id', $request->user()->id)->first();


            return $profile;


        }
        if ($request->user()->role == 'admin') {
            # code...

            $profiles = User::with('profile')->get()->latest();


            return $profiles;
        }


    }



    public function update_profile(Request $request)
    {


        if ($request->type == 'avatar') {
            # code...

            $doc = $request->file('avatar');
            $new_name = rand().".".$doc->getClientOriginalExtension();
            $doc->move(public_path('avatars'), $new_name);

            $avatar = User::where('id',$request->user()->id)->update([
                'avatar' => config('app.url').'avatars/'.$new_name
            ]);


            return $avatar;
        }else{
            try {
                //code...
    
                $profile = UserProfile::updateOrCreate([
                    'user_id' => $request->user()->id
                ],[
                'residential_address' => $request->residential_address,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'nok_name' => $request->nok_name,
                'nok_email' => $request->nok_email,
                'nok_address' => $request->nok_address,
                'nin' => $request->nin,
                'dob' => $request->dob,
                'nok_phone' => $request->nok_phone,
                'bank_code' => $request->bank_code,
                'bank_name' => $request->bank_name,
                'auth_code' => $request->auth_code,
                'account_name' => $request->account_name,
                'account_no' => $request->account_no,
    
            ]);

            User::find($request->user()->id)->update([
                'status' => 'verified'
            ]);
            
    
    
            return $profile;
    
    
            } catch (\Throwable $th) {
                //throw $th;
    
                return $th;
            }
        }
                
 
    }


    public function users(Request $request)
    {
        

        if ($request->user()->role == 'admin') {
            # code...

            $users = User::with('profile')->latest()->get();

                
            return $users;
        }

    }

    public function add_new_user(Request $request)
    {

        $regCode = "LEP" .rand(11100,999999);

        $otp = rand(111111,999999);
       

        try {
            //code...
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'usercode' => $regCode,
                'otp' => $otp,
                // 'sponsors_id' => $validatedData['referrer_code'],
                'password' => Hash::make($otp),
            ]);


            
            
            try {

                $datax = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'otp' => $user->otp,
                    'password' => $user->otp
                ];

                //code...
                Mail::to($user->email)
                ->send(new Welcome($datax));
    
    
    
                // Mail::to($user->email)
                // ->send(new EmailVerification($datax));

            } catch (\Throwable $th) {
                //throw $th;

                return $th;
            }

            
            
            
            return $user;

        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }

    public function user_data(Request $request)
    {
        # code...

        $user = User::find($request->user_id);

        return $user;
    }


}
