<?php

namespace App\Http\Controllers;
use App\Deposit;
use Illuminate\Http\Request;

class DepositsController extends Controller
{
	public function store(Request $request)
	{
	    $this->validate(request(),[
			"amount" => 'required|numeric'
		]);

		$deposit = new Deposit();
		$account = auth()->user()->account()->first();
		$amount = $request->amount;

//		dd(auth()->user()->account()->first());
		$deposit->account_id = $account->id;
		$deposit->amount = $amount; 
		$deposit->status = 'funds';

		$deposit->save();

		$value = $account->value + $amount ; 
		
		$account->value = $value;

		$account->save();

		return redirect('/accounts');
		//return view('home');
	}
}
