<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class UploadFileController extends Controller
{
    //

    public function upload_file(Request $request)
    {
        # code...

        // return $request()->all();

        try {
            //code...
            $doc = $request->file('avatar');
            $new_name = rand().".".$doc->getClientOriginalExtension();
            return $doc->move(public_path('avatars'), $new_name);
    
       
        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

        



        
    }
}
