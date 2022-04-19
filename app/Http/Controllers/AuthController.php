<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

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
        return redirect('views/home');
    }

}
