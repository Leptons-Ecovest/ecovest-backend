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
}
