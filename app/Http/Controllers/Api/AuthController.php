<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'password'          => 'required',
            'user_type'         => 'required',
            'phone_no'          => 'required|unique:users'                
        ]);
        if($request->user_type == 'user') {
            $data = [
                'name'              => $request->name,
                'password_hash'     => Crypt::encryptString($request->password),
                'phone_no'          => $request->phone_no,
            ];   
            // creating user object to store data since password_hash is a hidden field, thus cannot be assigned directly using create($data)  
            $user = new User($data);    
            $user->password_hash = $data["password_hash"];
            $user->save();
            return response()->json(['message' => 'User created successfully.'], 201);
        }
        else if($request->user_type == 'agent') {
            $data = [
                'name'              => $request->name,
                'password_hash'     => Crypt::encryptString($request->password),
                'phone_no'          => $request->phone_no,
                'username'          => $request->username
            ]; 
            // creating user object to store data since password_hash is a hidden field, thus cannot be assigned directly using create($data)  
            $agent = new Agent($data);    
            $agent->password_hash = $data["password_hash"];
            $agent->save(); 
            return response()->json(['message' => 'Agent created successfully.'], 201);
        }       
    }
}