<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Package;

class PackageController extends Controller
{
    //

    public function create_package(Request $request)
    {
        # code...

        $package = Package::create([
            ''
        ]);

        return $package;
    }

    public function packages()
    {
        # code...

        $packages = Package::latest()->get();

        return $packages;
    }

    public function package(Request $request)
    {
        # code...

        $package = Package::find($request->id);

        return $package;
    }

    public function activate_package(Request $request)
    {
        # code...

        $package = Package::find($request->id)->upate([
            'status' => 'active'
        ]);

        return $package;
    }

    public function deactivate_package(Request $request)
    {
        # code...

        $package = Package::find($request->id)->upate([
            'status' => 'inactive'
        ]);

        return $package;
    }

    public function update_package(Request $request)
    {
        # code...

        $package = Package::find($request->id)->upate([
            'status' => 'inactive'
        ]);

        return $package;
    }

    public function delete(Request $request)
    {
        # code...

        $package = Package::find($request->id)->delete();


        return $package;
    }
}
