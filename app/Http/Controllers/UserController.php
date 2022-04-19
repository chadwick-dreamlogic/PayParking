<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getUserDetails($vehicle_reg_no)
    {
        $vehicle_reg_no = str_replace('%20', ' ', $vehicle_reg_no);
        $user = User::where('vehicle_reg_no', '=', $vehicle_reg_no)->get();
        $user_transactions = Transaction::where('user_id', '=', $user[0]->id)
                                        ->join('packages', 'packages.id', '=', 'transactions.pass_id')
                                        ->orderByDesc('transactions.created_at')                                       
                                        ->select('transactions.*', 'packages.validity', 'packages.price', 'packages.name')
                                        ->limit(1)
                                        ->get();
        if(count($user_transactions)) {
            $creation_date      = strtotime($user_transactions[0]->created_at);
            $valid_till         = strtotime($user_transactions[0]->validity, $creation_date);
            $user[0]->validTill = date('Y-m-d H:i:s', $valid_till);
            $user[0]->status    = $user_transactions[0]->status;
            $user[0]->amount    = $user_transactions[0]->price;
            $user[0]->passName  = $user_transactions[0]->name;
            $user[0]->car       = $user[0]->car_model;
            unset($user[0]->car_model);
        }
            return response()->json($user, 200);     
    }

    public function createUser(Request $request) {
        $this->validate($request, [
            'name'              => 'required',
            'password'          => 'required',
            'phone_no'          => 'required|max:10|unique:users',
            'vehicle_reg_no'    => 'required',
            'car'               => 'required'
        ]);
        $data = [
            'name'              => $request->name,
            'password_hash'     => Crypt::encryptString($request->password),
            'phone_no'          => $request->phone_no,
            'vehicle_reg_no'    => $request->vehicle_reg_no,
            'car_model'         => $request->car,
        ];   
        // creating user object to store data since password_hash is a hidden field, thus cannot be assigned directly using create($data)  
        $user = new User($data);    
        $user->password_hash = $data["password_hash"];
        $user->save();
        return response()->json($user, 201);
    }

    public function listUsers()
    {
        $users = User::all();
        return view('pages/users', ['users' => $users, 'path'=>'users']);
    }
}
