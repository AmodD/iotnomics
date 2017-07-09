<?php

namespace App\Http\Controllers;

use DB;
use App\Sell;
use App\Wallet;
use App\Commission;
use App\Deposit;
use Illuminate\Http\Request;

class SellsController extends Controller
{
    //
   public function index()
   {
	   $data = auth()->user()->account()->first();
	   
	   if(empty($data)) return redirect('/accounts');
	   if($data->wallets()->get()->isEmpty()) return redirect('/wallets');
//	   dd($data->coins());
	   return view('home',compact('data'));
   }



	public function store(Request $request)
	{
	    $this->validate(request(),[
		    "coin_id" => "required",
			"quantity" => 'nullable|numeric|max:'.$request->balance
		]);

//	    return back();

//		dd($request);
		$sell = new Sell();

		$sell->wallet_id = $request->wallet_id;
		$sell->coin_id = $request->coin_id;
		$sell->amount = $request->amount;
		$sell->quantity = $request->quantity;
		$sell->rate = $request->rate;
		$sell->status = "completed";
		
		$sell->save();
		
		$deposit = new Deposit();
		$account = auth()->user()->account()->first();

//		dd(auth()->user()->account()->first());
		$deposit->account_id = $account->id;
		$deposit->amount = $request->amount; 
		$deposit->status = 'trades';

		$deposit->save();

		DB::table('accounts')
			->where([ 
				"user_id" => auth()->user()->id,
			])
			->increment('value', $request->amount);

		DB::table('wallets')
			->where([ 
				"account_id" => auth()->user()->account()->first()->id,
				"coin_id" => $request->coin_id
			])
			->decrement('quantity', $request->quantity, ['status' => 'ordered']);

		$commission = new Commission();
		$commission->commissionable_id = $sell->id;
		$commission->commissionable_type = 'App\Sell';
		$commission->amount = $request->commission ;

		$commission->save();

//		$wallet	= new Wallet();

//		$wallet->account_id = auth()->user()->account()->first()->id;
//		$wallet->coin_id = $request->coin_id;
//		$wallet->quantity = $request->quantity;
//		$wallet->status = "completed";

//		$wallet->save();

		return redirect("/wallets");	

	}
}
