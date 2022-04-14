<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

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
        return response()->json(Transaction::where('user_id', '=', $user_id)->latest()->get(), 200);
    }

    // enter transaction details in transactions table on successful payment
    public function buyPass(Request $request)
    {
        $this->validate($request, [
            'userId'            => 'required',
            'passId'            => 'required',
            'amount'            => 'required',
            'bankTransactionId' => 'required'
        ]);
        $data = [
            'user_id'               => $request->userId,
            'pass_id'               => $request->passId,
            'amount'                => $request->amount,
            'bank_transaction_id'   => $request->bankTransactionId
        ];  
        $transaction = Transaction::create($data);
        return response()->json($transaction, 201);
    }

}
