<?php

namespace App\Http\Controllers;
use DB;
use App\Buy;
use App\Wallet;
use App\Commission;
use App\Withdrawal;
use Illuminate\Http\Request;

class BuysController extends Controller
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
			"amount" => 'nullable|numeric|max:'.$request->balance
		]);

//	    return back();

//		dd($request);
		$buy = new Buy();

		$buy->wallet_id = $request->wallet_id;
		$buy->coin_id = $request->coin_id;
		$buy->amount = $request->amount;
		$buy->quantity = $request->quantity;
		$buy->rate = $request->rate;
		$buy->status = "completed";
		
		$buy->save();
		
		$withdrawal = new Withdrawal();
		$account = auth()->user()->account()->first();

//		dd(auth()->user()->account()->first());
		$withdrawal->account_id = $account->id;
		$withdrawal->amount = $request->amount; 
		$withdrawal->status = 'trades';

		$withdrawal->save();

		DB::table('accounts')
			->where([ 
				"user_id" => auth()->user()->id,
			])
			->decrement('value', $request->amount);

		DB::table('wallets')
			->where([ 
				"account_id" => auth()->user()->account()->first()->id,
				"coin_id" => $request->coin_id
			])
			->increment('quantity', $request->quantity, ['status' => 'ordered']);

		$commission = new Commission();
		$commission->commissionable_id = $buy->id;
		$commission->commissionable_type = 'App\Buy';
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
