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

    public function getUserTransactions($user_id)
    {
        return response()->json(Transaction::where('user_id', '=', $user_id)->latest()->get(), 200);
    }

}
