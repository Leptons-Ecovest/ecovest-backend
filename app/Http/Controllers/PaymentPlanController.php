<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentPlan;

use App\Models\PaymentSchedule;

use App\Models\BuildingProject;

use App\Models\User;

use App\Models\Notification;

use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

use App\Mail\PaymentReminder;

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

            Notification::create([
                'user_id' => $user->id,
                'title' => 'New Projected Created',
                'message' => 'Your project has been created with description: ' .$request->description.'.'
            ]);

            $payments = PaymentSchedule::where('payment_plans_id', $payment_plan->id)->latest()->get();
            // return $payments;
            

                  //code...
                  $datax = [
                    'description' => $request->description,
    
                    'project_title' => $project->title,
    
                    'name' => $user->name,

                    
    
                ];
               try {
                   //code...
                   Mail::to($user->email)
                   ->send(new PlanCreated($datax, $payments));
                   
               } catch (\Throwable $th) {
                   //throw $th;
               }
    
            


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


        // return $request->all();

        if ($request->payment_plan_id) {
            # code...

            $paid_schedules = PaymentSchedule::with('payment_plan.building_project')
            ->where('payment_plans_id', $request->payment_plan_id)->latest()->get();


            return $paid_schedules;
        }


        if ($request->user()->role == 'admin') {
            # code...

            $payment_plans = PaymentPlan::with('building_project')->with('payment_schedules')->with('user')->get();

            return $payment_plans;

        }
        
        if($request->user()->role == 'user' && !$request->payment_plan_id){
            # code...

            try {
                //code...
                
                    // return $request->user();

                // $payment_plan = PaymentPlan::with('payment_schedules')->find($request->payment_plan_id);

                $payment_plan = PaymentPlan::with('building_project')->with('payment_schedules')->where('user_id', $request->user()->id)->get();

                $payment_plan_ids = $payment_plan->pluck('id');

                $unpaid_schedules = PaymentSchedule::with('payment_plan.building_project')
                ->whereIn('payment_plans_id', $payment_plan_ids)
                ->where('amount_paid','0' )
                ->orderBy('payment_due_date', 'asc')->get();

                $paid_schedules = PaymentSchedule::with('payment_plan.building_project')
                ->whereIn('payment_plans_id', $payment_plan_ids)
                ->where('amount_paid','!=','0' )->latest()->get();
                

                return response()->json([
                    'payment_plan' => $payment_plan,
                    'unpaid_schedules' => $unpaid_schedules[0],
                    'paid_schedules' => $paid_schedules

                ]);
            } catch (\Throwable $th) {
                //throw $th;

                return $th;
            }
        }





    }

    public function send_reminders(Request $request)
    {
        # code...

     
            

            $schedules30 = PaymentSchedule::with('payment_plan.user')->with('payment_plan.building_project')->where('status', 'unpaid')
            ->whereBetween('payment_due_date', [now()->addDays(30), now()->addDays(31) ])->get();

            $schedules21 = PaymentSchedule::with('payment_plan.user')->with('payment_plan.building_project')->where('status', 'unpaid')
            ->whereBetween('payment_due_date', [now()->addDays(21), now()->addDays(22) ])->get();

            $schedules14 = PaymentSchedule::with('payment_plan.user')->with('payment_plan.building_project')->where('status', 'unpaid')
            ->whereBetween('payment_due_date', [now()->addDays(14), now()->addDays(15) ])->get();

            $schedules7 = PaymentSchedule::with('payment_plan.user')->with('payment_plan.building_project')->where('status', 'unpaid')
            ->whereBetween('payment_due_date', [now()->addDays(7), now()->addDays(8) ])->get();

            $schedules3 = PaymentSchedule::with('payment_plan.user')->with('payment_plan.building_project')->where('status', 'unpaid')
            ->whereBetween('payment_due_date', [now()->addDays(3), now()->addDays(4) ])->get();

            $schedules1 = PaymentSchedule::with('payment_plan.user')->with('payment_plan.building_project')->where('status', 'unpaid')
            ->whereBetween('payment_due_date', [now()->addDays(1), now()->addDays(2) ])->get();
            
                      
            // return $schedules1;

            foreach ($schedules1 as $schedule1) {
                # code...

                

                try {
                    //code...

                    $datax =[
                        'name' => $schedule1->payment_plan->user->name,
                        'title' => $schedule1->payment_plan->building_project->title,
                        'location' => $schedule1->payment_plan->building_project->location,
                        'description' => $schedule1->payment_plan->description,
                        'total_amount' => $schedule1->payment_plan->total_amount,
                        'payment_date' => $schedule1->payment_due_date,
                        'expected_amount' => $schedule1->expected_amount,
                        'due_date' => 'A days time'
    
                    ];
    
                    Mail::to($schedule1->payment_plan->user->email)
                    ->send(new PaymentReminder($datax));


                    return 'sent';
    
                } catch (\Throwable $th) {
                    //throw $th;

                    return $th;
                }

               
                // try {
                //     //code...
                // } catch (\Throwable $th) {
                //     //throw $th;
                // }
            }

            foreach ($schedules3 as $schedule1) {
                # code...

                

                try {
                    //code...

                    $datax =[
                        'name' => $schedule1->payment_plan->user->name,
                        'title' => $schedule1->payment_plan->building_project->title,
                        'location' => $schedule1->payment_plan->building_project->location,
                        'description' => $schedule1->payment_plan->description,
                        'total_amount' => $schedule1->payment_plan->total_amount,
                        'payment_date' => $schedule1->payment_due_date,
                        'expected_amount' => $schedule1->expected_amount,
                        'due_date' => '3 days time'
    
                    ];
    
                    Mail::to($schedule1->payment_plan->user->email)
                    ->send(new PaymentReminder($datax));


                    return 'sent';
    
                } catch (\Throwable $th) {
                    //throw $th;

                    return $th;
                }

               
                // try {
                //     //code...
                // } catch (\Throwable $th) {
                //     //throw $th;
                // }
            }

            foreach ($schedules7 as $schedule1) {
                # code...

                

                try {
                    //code...

                    $datax =[
                        'name' => $schedule1->payment_plan->user->name,
                        'title' => $schedule1->payment_plan->building_project->title,
                        'location' => $schedule1->payment_plan->building_project->location,
                        'description' => $schedule1->payment_plan->description,
                        'total_amount' => $schedule1->payment_plan->total_amount,
                        'payment_date' => $schedule1->payment_due_date,
                        'expected_amount' => $schedule1->expected_amount,
                        'due_date' => '7 days time'
    
                    ];
    
                    Mail::to($schedule1->payment_plan->user->email)
                    ->send(new PaymentReminder($datax));


                    return 'sent';
    
                } catch (\Throwable $th) {
                    //throw $th;

                    return $th;
                }

               
                // try {
                //     //code...
                // } catch (\Throwable $th) {
                //     //throw $th;
                // }
            }

            foreach ($schedules21 as $schedule1) {
                # code...

                

                try {
                    //code...

                    $datax =[
                        'name' => $schedule1->payment_plan->user->name,
                        'title' => $schedule1->payment_plan->building_project->title,
                        'location' => $schedule1->payment_plan->building_project->location,
                        'description' => $schedule1->payment_plan->description,
                        'total_amount' => $schedule1->payment_plan->total_amount,
                        'payment_date' => $schedule1->payment_due_date,
                        'expected_amount' => $schedule1->expected_amount,
                        'due_date' => '21 days time'
    
                    ];
    
                    Mail::to($schedule1->payment_plan->user->email)
                    ->send(new PaymentReminder($datax));


                    return 'sent';
    
                } catch (\Throwable $th) {
                    //throw $th;

                    return $th;
                }

               
                // try {
                //     //code...
                // } catch (\Throwable $th) {
                //     //throw $th;
                // }
            }

            foreach ($schedules30 as $schedule1) {
                # code...

                

                try {
                    //code...

                    $datax =[
                        'name' => $schedule1->payment_plan->user->name,
                        'title' => $schedule1->payment_plan->building_project->title,
                        'location' => $schedule1->payment_plan->building_project->location,
                        'description' => $schedule1->payment_plan->description,
                        'total_amount' => $schedule1->payment_plan->total_amount,
                        'payment_date' => $schedule1->payment_due_date,
                        'expected_amount' => $schedule1->expected_amount,
                        'due_date' => '30 days time'
    
                    ];
    
                    Mail::to($schedule1->payment_plan->user->email)
                    ->send(new PaymentReminder($datax));


                    return 'sent';
    
                } catch (\Throwable $th) {
                    //throw $th;

                    return $th;
                }

               
                // try {
                //     //code...
                // } catch (\Throwable $th) {
                //     //throw $th;
                // }
            }

            // return $schedulex=[
            //     'schedules1' => $schedules1,
            //     'schedules3' => $schedules3,
            //     'schedules7' => $schedules7,
            //     'schedules14' => $schedules14,
            //     'schedules21' => $schedules21,
            //     'schedules30' => $schedules30
            // ];



    }





}
