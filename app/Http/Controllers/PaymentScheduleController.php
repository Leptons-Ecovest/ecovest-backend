<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentSchedule;

use App\Models\PaymentPlan;

class PaymentScheduleController extends Controller
{
    //


    public function update_payment_plan(Request $request)
    {
        # code...

        // return $request->all();

        try {
            //code...
            $payment_schedule_update = PaymentSchedule::with('payment_plan')->find($request->payment_schedule_id)->update([
                'amount_paid' => $request->payment_amount,
                'status' => 'paid',
                'color_code' => 'success' 
            ]);

            $payment_schedule_updatex = PaymentSchedule::with('payment_plan')->find($request->payment_schedule_id);

            $update_payment_plan = PaymentPlan::where('id',$payment_schedule_updatex->payment_plan->id)->first()->update([
                'status' => 'running'
            ]);
    
            return [
                'payment_schedule_update' => $payment_schedule_update,
                'payment_schedule_updatex' => $payment_schedule_updatex,
                'payment_plan_id'=> $request->payment_schedule_id
            ];


        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


    }


}
