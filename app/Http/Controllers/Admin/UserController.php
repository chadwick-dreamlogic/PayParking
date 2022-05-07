<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $this->validate($request, [
            'name'              => 'required',
            'password'          => 'required',
            'phone_no'          => 'required|unique:users'
        ]);
        $data = [
            'name'              => $request->name,
            'password_hash'     => Crypt::encryptString($request->password),
            'phone_no'          => $request->phone_no
        ];   
        // creating user object to store data since password_hash is a hidden field, 
        // thus cannot be assigned directly using create($data)  
        $user = new User($data);    
        $user->password_hash = $data["password_hash"];
        $user->save();
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function listUsers()
    {
        $users = User::all();
        return view('pages/users', ['users' => $users, 'path'=>'users', 'message' => 'null']);
    }

    public function updateUser($id, Request $request) {
        $user = User::findOrFail($id);
        if($user->phone_no != $request->phone_no) {
            $this->validate($request, [
                'name'              => 'required',
                'phone_no'          => 'required|unique:users'
            ]);
        }
        else {
            $this->validate($request, [
                'name'              => 'required',
                'phone_no'          => 'required'
            ]);
        }
        $user->update($request->all());
        return response()->json(['message' => 'User updated successfully'], 200);
    }

    public function deleteUser($id)
    {
        $result = User::findOrFail($id)->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
    
}