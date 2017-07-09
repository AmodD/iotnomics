<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
   public function index()
   {
	   $data = auth()->user()->account()->first();
//	   dd($data);
	return view('home',compact('data'));
   }

   public function show(Account $account)
   {
	   //dd($auth()->user());
	   $data = $account;
	return view('home',compact('data'));
   }

   public function store()
   {
	   $account = new Account();

	   $account->firstOrCreate([
	   	"user_id" => auth()->user()->id,
	   	"status" => "active"
	   ]);

	   $data = auth()->user()->account()->first();
	   return view('home',compact('data'));
   }
}
