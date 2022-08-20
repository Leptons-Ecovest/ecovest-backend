<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentSchedule;

use App\Models\PaymentStage;

use App\Models\PaymentPlan;

use Illuminate\Support\Facades\Mail;

use App\Mail\PaymentReceiptMail;

class PaymentScheduleController extends Controller
{
    //


    public function update_payment_plan(Request $request)
    {
        # code...

        // return $request->all();

        try {
            //code...
            $payment_schedule_update = PaymentStage::find($request->payment_schedule_id)->update([
                'amount_remitted' => $request->payment_amount,
                'status' => 'paid',
            ]);

            // $payment_schedule_updatex = PaymentSchedule::find($request->payment_schedule_id);

            // $update_payment_plan = PaymentPlan::where('id',$payment_schedule_updatex->payment_plan->id)->first()->update([
            //     'status' => 'running'
            // ]);
    
            // return [
            //     'payment_schedule_update' => $payment_schedule_update,
            //     'payment_schedule_updatex' => $payment_schedule_updatex,
            //     'payment_plan_id'=> $request->payment_schedule_id
            // ];

            $user_payment = PaymentStage::with('plan')->find($request->payment_schedule_id);

            $datax =[

            ];


            
            try {
                //code...

                Mail::to('verify@leptonsecovest.com')
                ->send(new PaymentReceiptMail($datax));


                Mail::to($user_payment->plan->user->email)
                ->send(new PaymentReceiptMail($datax));
                
            } catch (\Throwable $th) {
                //throw $th;

                return $th;
            }

            return $payment_schedule_update;


        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


    }

    public function update_plan(Request $request)
    {
        # code...

        $payment_plan = PaymentPlan::find($request->payment_plan_id)->update([
            'status' => $request->status,
            'percent_completion' => $request->percentage
        ]);
        

        return $payment_plan;
    }


}
