<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\OfferLetterEmail;

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
}
