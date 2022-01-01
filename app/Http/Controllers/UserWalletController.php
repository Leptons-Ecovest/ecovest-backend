<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserWallet;

class UserWalletController extends Controller
{
    //

    public function wallet_balance(Request $request)
    {
        # code...

       

        $user_wallet = UserWallet::latest()->where('user_id', 10001)->get();

       

        $total_credit = UserWallet::where('user_id', 10001)->where('type', 'credit')->sum('amount');

        $total_debit = UserWallet::where('user_id', 10001)->where('type', 'debit')->sum('amount');

        $wallet_balance = $total_credit - $total_debit;

     



        return response()->json([
            // 'access_token' => $token,
            'user_wallet' => $user_wallet,
            'wallet_balance' => $wallet_balance
 
        ]);  

        
    }
}
