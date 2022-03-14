<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentSchedule;

class PaymentScheduleController extends Controller
{
    //


    public function update_payment_plan(Request $request)
    {
        # code...

        // return $request->all();

        try {
            //code...
            $payment_schedule_update = PaymentSchedule::find($request->payment_schedule_id)->update([
                'amount_paid' => $request->payment_amount,
                'status' => 'paid',
                'color_code' => 'success' 
            ]);
    
            return $payment_schedule_update;


        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


    }
}
