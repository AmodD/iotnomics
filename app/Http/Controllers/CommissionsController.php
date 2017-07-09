<?php

namespace App\Http\Controllers;

use App\Commission ;
use Illuminate\Http\Request;

class CommissionsController extends Controller
{
    //
   public function index()
   {
	   $data = Commission::all();
//	   $data = auth()->user()->account()->first();
//	   dd($data->coins());
	   return view('home',compact('data'));
   }

}
