<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentPlan;

use App\Models\PaymentSchedule;

use App\Models\BuildingProject;

use App\Models\User;

use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

use App\Mail\PlanCreated;

class PaymentPlanController extends Controller
{
    //

    public function create_payment_plan(Request $request)
    {
        # code...

        $project = BuildingProject::where('title', $request->building_project_title)->first();

        $user = User::where('email', $request->subscribers_email)->first();


        try {
            //code...

            $building_project = BuildingProject::find($project->id);

       

            $payment_plan = PaymentPlan::create([
                'user_id' => $user->id,
                'building_project_id' => $project->id,
                'start_date' => $request->start_date,
                'duration' => $building_project->duration,
                'end_date' => Carbon::parse($request->start_date)->addMonth($building_project->duration),
                'description' => $request->description,
                'total_amount' => $building_project->property_price,
                'status' => 'active'
            ]);

            $single_payment_units = $building_project->property_price * 0.01;

            $payment_units = [
                ($single_payment_units * 30),
                ($single_payment_units * 20),
                ($single_payment_units * 20),
                ($single_payment_units * 20),
                ($single_payment_units * 10),
                
            ];

            $month_no = 3;


            for ($i=0; $i < count($payment_units) ; $i++) { 
                # code...

    
                $payment_schedule = PaymentSchedule::create([
                    'payment_plans_id' => $payment_plan->id,
                    'payment_due_date' => Carbon::parse($payment_plan->start_date)->addMonth($month_no),
                    'expected_amount' => $payment_units[$i],
                    'amount_paid' => 0,
                ]);

                $month_no += 3;
    
            }

            // return $payment_schedule;
    
            


        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }



        // $expected_amount = $request->total_amount / $request->month_duration;



        // 20
        // 20
        // 20
        // 10

        try {
            //code...
            $datax = [
                'name' => $user->name,
                'email' => $user->email,
                'project_title' => $project->title
            ];
                Mail::to($user->email)
                ->send(new PlanCreated($datax));
                
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }




        return response()->json([
            'payment_plan' => $payment_plan,

        ]);
    }

    public function payment_plans(Request $request)
    {
        # code...


        if ($request->user()->role == 'admin') {
            # code...

            $payment_plans = PaymentPlan::with('building_project')->with('payment_schedules')->with('user')->get();

            return $payment_plans;

        }else {
            # code...

                    // return $request->user();

                // $payment_plan = PaymentPlan::with('payment_schedules')->find($request->payment_plan_id);

                $payment_plan = PaymentPlan::with('building_project')->with('payment_schedules')->where('user_id', $request->user()->id)->first();




                return response()->json([
                    'payment_plan' => $payment_plan,

                ]);
        }





    }
}
