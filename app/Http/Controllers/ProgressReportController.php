<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProgressReport;

use App\Models\PaymentPlan;

use App\Models\ProgressReportAsset;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;

class ProgressReportController extends Controller
{
    //

    public function progress_report(Request $request)
    {


        // return $request->all();

        try {
            //code...

            $payment_plan_data = PaymentPlan::with('user')->where('building_project_id', $request->building_project_id)->first();


            $report = ProgressReport::create([
    
                'payment_plan_id' => $payment_plan_data->id,
                'subscriber_id' => $request->user()->id,
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
            $reports = ProgressReport::where('subscriber_id', $request->user()->id)->with('assets')->with('payment_plan.building_project')->get();
    
            return $reports;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }
}
