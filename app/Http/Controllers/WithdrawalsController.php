<?php

namespace App\Http\Controllers;
use App\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    //
	public function store(Request $request)
	{
	    $this->validate(request(),[
			"amount" => 'required|numeric'
		]);

		$withdrawal = new Withdrawal();
		$account = auth()->user()->account()->first();
		$amount = $request->amount;

//		dd(auth()->user()->account()->first());
		$withdrawal->account_id = $account->id;
		$withdrawal->amount = $amount; 
		$withdrawal->status = 'funds';

		$withdrawal->save();

		$value = $account->value - $amount ; 
		
		$account->value = $value;

		if( $value > 0 ) $account->save();

		return redirect('/accounts');
		//return view('home');
	}
}
