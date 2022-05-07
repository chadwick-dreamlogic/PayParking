<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function getTransactionByVehicleId($vehicle_id) {
        $transactions = Transaction::where('vehicle_id', $vehicle_id)
                                    ->join('packages', 'packages.id', '=', 'transactions.pass_id')
                                    ->join('users', 'users.id', '=', 'transactions.user_id')
                                    ->select('transactions.*', 'packages.name as item_name', 'users.name as username')                            
                                    ->orderByDesc('created_at')
                                    ->get();
        return response()->json(['transactions' => $transactions], 200);
    }

    public function getTransactionByUserId($user_id) {
        $transactions = Transaction::where('user_id', $user_id)
                                    ->join('packages', 'packages.id', '=', 'transactions.pass_id')
                                    ->join('vehicles', 'vehicles.id', '=', 'transactions.vehicle_id')
                                    ->select('transactions.*', 'packages.name as item_name', 'vehicles.reg_no as vehicle_reg_no')
                                    ->orderByDesc('created_at')
                                    ->get();
        return response()->json(['transactions' => $transactions], 200);
    }
}