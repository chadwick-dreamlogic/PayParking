<?php

namespace App\Http\Controllers\Api;

use App\Models\Log;
use App\Models\User;
use App\Models\Package;
use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function searchUserDetails(Request $request)
    {
        $vehicle = Vehicle::where('reg_no', '=', $request->vehicle_reg_no)->get();
        if(!$vehicle->isEmpty()) {
            $transactions = Transaction::where('vehicle_id', '=', $vehicle[0]->id)
                ->join('packages', 'packages.id', '=', 'transactions.pass_id')
                ->orderByDesc('transactions.created_at')                                       
                ->select('transactions.*', 'packages.validity', 'packages.price', 'packages.name')
                ->limit(1)
                ->get();
            $log_data = [
                "user_id"   => $request->user_id,
                "latitude"  => $request->latitude, 
                "longitude" => $request->longitude
            ];
            Log::create($log_data);
            if(!$transactions->isEmpty()) {
                $creation_date                  = strtotime($transactions[0]->created_at);
                $valid_till                     = strtotime($transactions[0]->validity, $creation_date);
                $vehicle[0]->validTill             = date('Y-m-d H:i:s', $valid_till);
                $vehicle[0]->status                = $transactions[0]->status;
                $vehicle[0]->amount                = $transactions[0]->price;
                $vehicle[0]->passName              = $transactions[0]->name;
                $vehicle[0]->car                   = $vehicle[0]->model;
                $vehicle[0]->registrationNumber    = $vehicle[0]->reg_no;
                unset($vehicle[0]->model);
            }
            return response()->json($vehicle, 200);     
        }
        else {
            return response()->json(['message'=>'Vehicle not found.'], 404);
        }
    }
   
}
