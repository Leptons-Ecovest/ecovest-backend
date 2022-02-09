<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserProfile;

use App\Models\User;



class UserProfileController extends Controller
{
    //



    public function update_profile()
    {
        $profile = UserProfile::updateOrCreate([
                'user_id' => $request->user()->id
            ],[
            'residential_address' => $request->residential_address,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'nok_name' => $request->nok_name,
            'nok_address' => $request->nok_address,
            'nok_phone' => $request->nok_phone,
            'bank_code' => $request->bank_code,
            'bank_name' => $request->bank_name,
            'auth_code' => $request->auth_code,
            'account_name' => $request->account_name,
            'account_no' => $request->account_no,
        ]);
        


                return response()->json([
                    'access_token' => $profile,
                
        ]);
    }


    public function users(Request $request)
    {
        

        if ($request->user()->role == 'admin') {
            # code...

            $users = User::latest()->get();

                
            return $users;
        }

    }


}
