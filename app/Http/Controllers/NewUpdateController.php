<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\NewUpdate;

class NewUpdateController extends Controller
{
    //

    public function notify_new_update(Request $request)
    {
        # code...


        $datax = [
            'name' => $request->name,
            'message' => $request->message,
        ];

        // try {
            //code...

            Mail::to($request->email)
            ->send(new NewUpdate($datax));




        return response()->json([
            'user_data' => 123,
        
        ]); 
    }
}
