<?php

namespace App\Http\Controllers\Api;

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
            'userId'            => 'required',
            'passId'            => 'required',
            'amount'            => 'required',
            'bankTransactionId' => 'required',
            'status'            => 'required'
        ]);
        $data = [
            'user_id'               => $request->userId,
            'pass_id'               => $request->passId,
            'amount'                => $request->amount,
            'bank_transaction_id'   => $request->bankTransactionId,
            'status'                => $request->status
        ];  
        $transaction = Transaction::create($data);
        return response()->json($transaction, 201);
    }

}
