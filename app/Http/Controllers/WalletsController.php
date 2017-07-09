<?php

namespace App\Http\Controllers;
use App\Wallet;
use Illuminate\Http\Request;

class WalletsController extends Controller
{
    //
   public function index()
   {
	   $data = auth()->user()->account()->first();
	   if(empty($data)) return redirect('/accounts');
//	   dd($data->wallets()->get(),$data->wallets()->get()->keyBy('coin_id')->get(2));
	return view('home',compact('data'));
   }

   public function store(Request $request)
   {
	   //	dd($request);
	   $wallet = new Wallet();

	   $wallet->account_id = auth()->user()->account()->first()->id;
	   $wallet->coin_id = $request->coin_id ;
	   $wallet->quantity = 0;
	   $wallet->status = "active";

	   $wallet->firstOrCreate([
	   "account_id" => auth()->user()->account()->first()->id,
	   "coin_id" => $request->coin_id,
	   "quantity" => 0,
	   "status" => "active"
	   ]);

	   return redirect("/wallets");
   }
}
