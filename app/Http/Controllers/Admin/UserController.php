<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $this->validate($request, [
            'name'              => 'required',
            'password'          => 'required',
            'phone_no'          => 'required|unique:users',
            'vehicle_reg_no'    => 'required',
            'car_model'         => 'required'
        ]);
        $data = [
            'name'              => $request->name,
            'password_hash'     => Crypt::encryptString($request->password),
            'phone_no'          => $request->phone_no,
            'vehicle_reg_no'    => $request->vehicle_reg_no,
            'car_model'         => $request->car_model,
        ];   
        // creating user object to store data since password_hash is a hidden field, thus cannot be assigned directly using create($data)  
        $user = new User($data);    
        $user->password_hash = $data["password_hash"];
        $user->save();
        return redirect('/admin/users', 201);
    }

    public function listUsers()
    {
        $users = User::all();
        return view('pages/users', ['users' => $users, 'path'=>'users']);
    }

    public function updateUser($id, Request $request) {
        $user = User::findOrFail($id);
        if($user->phone_no != $request->phone_no) {
            $this->validate($request, [
                'name'              => 'required',
                'phone_no'          => 'required|unique:users',
                'vehicle_reg_no'    => 'required',
                'car_model'         => 'required'
            ]);
        }
        else {
            $this->validate($request, [
                'name'              => 'required',
                'phone_no'          => 'required',
                'vehicle_reg_no'    => 'required',
                'car_model'         => 'required'
            ]);
        }
        $user->update($request->all());
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        $result = User::findOrFail($id)->delete();
        return redirect('/admin/users');
    }
    
}