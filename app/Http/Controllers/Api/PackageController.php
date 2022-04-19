<?php

namespace App\Http\Controllers\Api;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // get all packages
    public function getPackage()
    {
        return response()->json(Package::get(), 200);
    }
}
