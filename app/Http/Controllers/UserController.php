<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Http\Request;

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
        return response()->json(User::where('vehicle_reg_no', '=', $vehicle_reg_no)->get());
    }

    public function createUser(Request $request) {
        $this->validate($request, [
            'name'              => 'required',
            'password'          => 'required',
            'phone_no'          => 'required|max:10|unique:users',
            'vehicle_reg_no'    => 'required'
        ]);
        $data = [
            'name'              => $request->name,
            'password_hash'     => Crypt::encryptString($request->password),
            'phone_no'          => $request->phone_no,
            'vehicle_reg_no'    => $request->vehicle_reg_no    
        ];     
        $user = User::create($data);
        return response()->json($user, 201);
    }
}
