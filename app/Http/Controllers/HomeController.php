<?php

namespace App\Http\Controllers;

use App\Spread ;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$data = Spread::where('exchange_id',1)->orderBy('id','desc')->take(12)->get();


	return view('home',compact('data'));
        //return view('home');
    }
}
