<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\OfferLetterEmail;

use App\Models\User;

class OfferLetterController extends Controller
{
    //


    public function send_letter(Request $request)
    {
        # code...

        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
            try {
                //code...
                $datax = [];


                $sent = Mail::to($request->email)
                ->send(new OfferLetterEmail($datax));
        
        
                return $sent;


            } catch (\Throwable $th) {
                //throw $th;

                return $th;
            }




    }

    public function send_batch(Request $request)
    {
        # code...

        $user_ids = $request->ids;

        // return $user_ids;

        for ($i=0; $i < count($user_ids); $i++) { 
            # code...
            try {
                //code...

                $user = User::find($user_ids[$i]);

                $datax = [
                    'name' => $user->name
                ];


                $sent = Mail::to($user->email)
                ->send(new OfferLetterEmail($datax));
        
        
                // return $sent;


            } catch (\Throwable $th) {
                //throw $th;

                return $th;
            }
        }




    }


}
