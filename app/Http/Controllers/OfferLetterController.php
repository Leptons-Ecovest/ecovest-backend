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


            try {
                //code...

                $brochure = $request->file('brochure');
                $offer_letter = $request->file('offer_letter');

                $new_name1 = rand().".".$brochure->getClientOriginalExtension();
                $new_name2 = rand().".".$offer_letter->getClientOriginalExtension();

                $brochure->move(public_path('brochures'), $new_name1);
                $offer_letter->move(public_path('offer_letters'), $new_name2);
    
                // $avatar = User::where('id',$request->user()->id)->update([
                //     'avatar' => config('app.url').'avatars/'.$new_name
                // ]);

                $datax = [
                    'brochure_link' => config('app.url').'brochures/'.$new_name1,
                    'offer_letter_link' => config('app.url').'offer_letters/'.$new_name2,
                   
                    
                ];


                $sent = Mail::to($request->user_email)
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
