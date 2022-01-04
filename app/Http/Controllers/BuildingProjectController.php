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

        $building_project = BuildingProject::create([
            'title' => $request->title,
            'location' => $request->location,
            'apartment_size' => $request->apartment_size,
            'payment_plan' => $request->payment_plan,
            'property_price' => $request->property_price,
            'facilities' => $request->facilities,
            'estate_facilities' => $request->estate_facilities,
            'duration' => $request->duration,
        ]);

        return response()->json([
            'building_project' => $building_project,

        ]);


    }
}
