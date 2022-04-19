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
        return redirect('/admin/packages', 201);
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
        return redirect('/admin/packages');
    }

    public function deletePackage($id)
    {
        $result = Package::findOrFail($id)->delete();
        return redirect('/admin/packages');
    }

}