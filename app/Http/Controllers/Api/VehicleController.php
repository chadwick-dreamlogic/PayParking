<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // get all vehicles
    public function getVehicles()
    {
        return response()->json(Vehicle::get(), 200);
    }

    public function register(Request $request) {
        $this->validate($request, [
            'model' => 'required',
            'regNo' => 'required',
        ]);
        $data = [
            'model' => $request->model,
            'reg_no' => $request->regNo
        ];
        $vehicle = Vehicle::create($data);
        return response()->json($vehicle, 201);
    }
}