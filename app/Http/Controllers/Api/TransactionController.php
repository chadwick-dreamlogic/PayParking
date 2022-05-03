<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // get user transactions by user id
    public function getUserTransactions($user_id)
    {
        return response()->json(Transaction::where('user_id', '=', $user_id)
                                ->join('packages', 'packages.id', '=', 'transactions.pass_id')
                                ->orderByDesc('transactions.created_at')
                                ->select('transactions.*', 'packages.name as item_name')
                                ->get(), 200);
    }

    // enter transaction details in transactions table on successful payment
    public function buyPass(Request $request)
    {
        $this->validate($request, [
            'phoneNo'           => 'required',
            'passId'            => 'required',
            'amount'            => 'required',
            'bankTransactionId' => 'required',
            'vehicleRegNo'      => 'required',
            'status'            => 'required'
        ]);
        $user       = User::where('phone_no', $request->phoneNo)->get();
        $vehicle    = Vehicle::where('reg_no', $request->vehicleRegNo)->get();
        if(!$user->isEmpty() && !$vehicle->isEmpty()) {
            $data = [
                'user_id'               => $user[0]->id,
                'pass_id'               => $request->passId,
                'vehicle_id'            => $vehicle[0]->id,
                'amount'                => $request->amount,
                'bank_transaction_id'   => $request->bankTransactionId,
                'status'                => $request->status
            ];  
            $transaction = Transaction::create($data);
            return response()->json($transaction, 201);
        }
        else {
            return response()->json(['message' => 'Phone number not found. Please register before attempting to buy pass.'], 404);
        }
    }

}
