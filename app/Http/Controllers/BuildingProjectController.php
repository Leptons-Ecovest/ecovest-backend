<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BuildingProject;

class BuildingProjectController extends Controller
{
    //

    public function building_projects()
    {



        $building_projects = BuildingProject::latest()->get();
        
        
        return response()->json([
            'building_projects' => $building_projects,

        ]);
    }

    public function create_project(Request $request)
    {
        # code...

        $doc = $request->file('featured_image');
        $new_name = rand().".".$doc->getClientOriginalExtension();
        $file1 = $doc->move(public_path('featured_images'), $new_name);

        $building_project = BuildingProject::updateOrCreate([
            'title' => $request->title,
        ],[
            'title' => $request->title,
            'location' => $request->location,
            'apartment_size' => $request->apartment_size,
            'payment_plan' => $request->payment_plan,
            'property_price' => $request->property_price,
            'facilities' => $request->facilities,
            'estate_facilities' => $request->estate_facilities,
            'duration' => $request->duration,
            'featured_image' => config('app.url').'featured_images/'.$new_name
        ]);

        return response()->json([
            'building_project' => $building_project,

        ]);


    }

    public function deactivate_project(Request $request)
    {
        # code...

        if ($request->user()->role == 'admin') {
            # code...

           try {
               //code...

               $removed = BuildingProject::find($request->building_project_id)->update([
                   'status' => 'inactive'
               ]);

               return $removed;

           } catch (\Throwable $th) {
               //throw $th;

               return $th;
           }

        }else{

            return $response= [
                'message' => null
            ];
        }
    }

    public function activate_project(Request $request)
    {
        # code...

        if ($request->user()->role == 'admin') {
            # code...

           try {
               //code...

               $removed = BuildingProject::find($request->building_project_id)->update([
                   'status' => 'active'
               ]);

               return $removed;

           } catch (\Throwable $th) {
               //throw $th;

               return $th;
           }

        }else{

            return $response= [
                'message' => null
            ];
        }
    }
}
