<?php

namespace App\Http\Controllers;

use App\Spread; 
use Illuminate\Http\Request;

class SpreadsController extends Controller
{
	//
	public function store(Request $request)
	{
		Spread::create([
			"exchange_id" => 1,
			"coin_id" => 1,
			"buy" => $request->buy,
			"sell" => $request->sell,
			"avg" => $request->avg	
		]);

		return back();

	}
}
