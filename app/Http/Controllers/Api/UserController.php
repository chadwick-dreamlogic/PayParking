<?php

namespace App\Http\Controllers\Api;

use App\Models\Log;
use App\Models\User;
use App\Models\Package;
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
        $user = User::where('vehicle_reg_no', '=', $request->vehicle_reg_no)->get();
        $user_transactions = Transaction::where('user_id', '=', $user[0]->id)
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
        if(count($user_transactions)) {
            $creation_date      = strtotime($user_transactions[0]->created_at);
            $valid_till         = strtotime($user_transactions[0]->validity, $creation_date);
            $user[0]->validTill = date('Y-m-d H:i:s', $valid_till);
            $user[0]->status    = $user_transactions[0]->status;
            $user[0]->amount    = $user_transactions[0]->price;
            $user[0]->passName  = $user_transactions[0]->name;
            $user[0]->car       = $user[0]->car_model;
            $user[0]->registrationNumber = $user_transactions[0]->vehicle_reg_no;
            unset($user[0]->car_model);
        }
            return response()->json($user, 200);     
    }
   
}
