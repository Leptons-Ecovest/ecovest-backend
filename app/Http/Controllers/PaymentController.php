<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\RewardUplineEvent;

use App\Models\User;

use App\Models\Package;

use Auth; 


class PaymentController extends Controller
{
    //

    public function callback(Request $request)
    {
        # code...

        // return $request->user();

        try {
            //code...
            $package_id = 1;

            return event(new RewardUplineEvent(User::find($request->user()->id), Package::find($package_id) ));


        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


    }
}
