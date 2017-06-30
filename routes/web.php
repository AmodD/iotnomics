<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Spread ;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function() { 

	dd(file_get_contents("https://www.unocoin.com/trade?buy"));

});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', function () { 
	//	$data =	Spread::all();
	//
	$data = Spread::where('exchange_id',1)->orderBy('id','desc')->take(12)->get();


	return view('home',compact('data'));

})->name('dashboard');

Route::post('/spread','SpreadsController@store');
