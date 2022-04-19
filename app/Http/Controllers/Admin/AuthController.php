<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // create a new package
    public function login(Request $request) {
        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required'
        ]);
        $data = [
            'username'  => $request->username,
            'password'  => $request->password
        ];    
        return redirect('admin/home');
    }

}
