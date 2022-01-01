<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RTVRSEnumeration;

class RTVRSEnumerationController extends Controller
{
    //

    public function create_enumeration(Request $request)
    {
        # code...
        try {
            //code...

            $enumeration = RTVRSEnumeration::create([
                'state' => $request->state,
                'lga' => $request->lga,
                'town' => $request->town,
                'category' => $request->category,
                'hotel_name' => $request->hotel_name,
                'hotel_address' => $request->hotel_address,
                'contact_person' => $request->contact_person,
                'contact_person_phone' => $request->contact_person_phone,
                'contact_person_email' => $request->contact_person_email,
                'hotel_manager' => $request->hotel_manager,
                'hotel_manager_phone' => $request->hotel_manager_phone,
                'hotel_manager_email' => $request->hotel_manager_email,
                'number_of_rooms' => $request->number_of_rooms,
                'swimming_pools' => $request->swimming_pools,
                'reception' => $request->reception,
                'bar' => $request->bar,
                'lounge' => $request->lounge,
                'reporters_email' => $request->reporters_email,
            ]);
    
    
            return $enumeration;

            
        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


    }
}
