<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\ProgressReport;

use App\Modles\ProgressReportAsset;

use Illuminate\Support\Facades\Storage;

class ProgressReportController extends Controller
{
    //

    public function progress_report(Request $request)
    {

        return $request->assets;

        try {
            //code...
            foreach ($request->assets as $uploadedFile) {
                # code...
                $filename = time().$uploadedFile->getClientOriginalName();

                Storage::disk('local')->putFileAs(
                  'files/'.$filename,
                  $uploadedFile,
                  $filename
                );
            }
        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


        $payment_plan_data = PaymentPlan::with('user')->with('building_project', $request->building_project_id)->first();


        $report = ProgressReport::create([

            'payment_plan_id' => $payment_plan_data->id,
            'subscriber_id' => $request->user()->id,
            'reporter_id' => 10001,
            'description_work' => $request->description,
            'issues' => $request->issues,
            'stage' => $request->stage,
            'percentage_completion' => $request->percent,
            
        ]);




// progress_report_id
// media_type
// media_url
// status

        
        return 123;
    }
}
