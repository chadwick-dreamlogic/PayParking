<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
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
        return response()->json(['message' => 'Package registered successfully'], 201);
    }

    public function listPackages()
    {
        $packages = Package::all();
        return view('pages/packages', ['packages' => $packages, 'path'=>'packages', 'message' => 'null']);
    }

    public function updatePackage($id, Request $request) {
        $this->validate($request, [
            'name'      => 'required',
            'validity'  => 'required',
            'price'     => 'required'
        ]); 
        $package = Package::findOrFail($id);
        $package->update($request->all());
        return response()->json(['message' => 'Package updated successfully'], 200);
    }

    public function deletePackage($id)
    {
        $result = Package::findOrFail($id)->delete();
        return response()->json(['message' => 'Package deleted successfully'], 200);
    }

}