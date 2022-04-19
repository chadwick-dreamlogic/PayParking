<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // get all packages
    public function getPackage()
    {
        return response()->json(Package::get(), 200);
    }
    // create a new package
    public function createPackage(Request $request) {
        $this->validate($request, [
            'name'      => 'required',
            'validity'  => 'required',
            'price'     => 'required'
        ]);
        $data = [
            'name'      => $request->name,
            'validity'  => $request->validity,
            'price'     => $request->price
        ];    
        $package = Package::create($data);
        return redirect('/views/packages', 201);
    }

    public function listPackages()
    {
        $packages = Package::all();
        return view('pages/packages', ['packages' => $packages, 'path'=>'packages']);
    }

    public function updatePackage($id, Request $request) {
        $this->validate($request, [
            'name'      => 'required',
            'validity'  => 'required',
            'price'     => 'required'
        ]); 
        $package = Package::findOrFail($id);
        $package->update($request->all());
        return redirect('/views/packages');
    }

    public function deletePackage($id)
    {
        $result = Package::findOrFail($id)->delete();
        return redirect('/views/packages');
    }

}
