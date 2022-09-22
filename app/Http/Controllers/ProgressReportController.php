<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProgressReport;

use App\Models\PaymentPlan;

use App\Models\ProgressReportAsset;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Mail;

use App\Mail\ProjectProgressMail;

class ProgressReportController extends Controller
{
    //

    public function progress_report(Request $request)
    {


        // return $request->all();

        try {
            //code...

            $payment_plan_data = PaymentPlan::with('building_project')->with('user')->where('id', $request->payment_plan_id)->first();


            $report = ProgressReport::create([
    
                'payment_plan_id' => $payment_plan_data->id,
                'subscriber_id' => $payment_plan_data->user_id,
                'reporter_id' => 10001,
                'description_work' => $request->description,
                'issues' => $request->issues,
                'stage' => $request->stage,
                'percentage_completion' => $request->percent,
                
            ]);


            foreach ($request->assets as $uploadedFile) {
                # code...

            
                $new_name = rand().".". $uploadedFile->getClientOriginalExtension();
                $file1 = $uploadedFile->move(public_path('report_assets'), $new_name);

                $re = ProgressReportAsset::create([
                    'progress_report_id' => $report->id,
                    'media_type' => 'image',
                    'media_url' => config('app.url').'report_assets/'.$new_name,
                    'status' => 'active',
                ]);

            }

            $assets = ProgressReportAsset::where('progress_report_id', $report->id)->get();

            
            $datax =[
                'project_title' => $payment_plan_data->building_project->title,
                'project_price' => $payment_plan_data->building_project->property_price,
                'name' =>$payment_plan_data->user->name,
                'description_work' => $request->description,
                'issues' => $request->issues,
                'stage' => $request->stage,
                'percentage_completion' => $request->percent,
                'assets' => $assets[0]['media_url']
            ];


            
            try {
                //code...
                Mail::to('verify@leptonsecovest.com')
                ->send(new ProjectProgressMail($datax));


                Mail::to($payment_plan_data->user->email)
                ->send(new ProjectProgressMail($datax));
                
            } catch (\Throwable $th) {
                //throw $th;

                return $th;
            }

            // return $report;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }









    }

    public function get_reports(Request $request)
    {
        # code...


        try {
            //code...
            $reports = ProgressReport::where('payment_plan_id', $request->payment_plan_id)->with('assets')->with('subscribers')->with('payment_plan.building_project')->latest()->get();
    
            return $reports;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }
}
