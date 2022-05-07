<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    // create a new vehicle
    public function createVehicle(Request $request) {
        $this->validate($request, [
            'model'             => 'required',            
            'registrationNo'    => 'required'
        ]);
        $data = [
            'model'      => $request->model,
            'reg_no'  => $request->registrationNo
        ];    
        Vehicle::create($data);
        return response()->json(['message' => 'Vehicle registered successfully'], 201);
    }

    public function listVehicles()
    {
        $vehicles = Vehicle::all();
        return view('pages/vehicles', ['vehicles' => $vehicles, 'path'=>'vehicles', 'message' => 'null']);
    }

    public function updateVehicle($id, Request $request) {
        $this->validate($request, [
            'model'             => 'required',            
            'registrationNo'    => 'required'
        ]); 
        $data = [
            'model'      => $request->model,
            'reg_no'  => $request->registrationNo
        ];  
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($data);
        return response()->json(['message' => 'Vehicle updated successfully'], 200);
    }

    public function deleteVehicle($id)
    {
        $result = Vehicle::findOrFail($id)->delete();
        return response()->json(['message' => 'Vehicle deleted successfully'], 200);
    }

}