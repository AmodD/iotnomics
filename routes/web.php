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
})->name('main');

Route::get('/test', function() { 

	dd(file_get_contents("https://www.unocoin.com/trade?buy"));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard');

Route::get('/dashboard', function () { 

	return view('home'); 

})->name('dashboard');

Route::post('/spread','SpreadsController@store');
Route::get('/charts', function() { 
	
	$data = Spread::where('exchange_id',1)->orderBy('id','desc')->take(12)->get();

	return view('home',compact('data'));

})->name('charts');

Route::get('/users', 'UsersController@index')->name('users');
Route::patch('/users/{user}','UsersController@update');
Route::delete('/users/{user}','UsersController@destroy');

Route::get('/accounts', 'AccountsController@index')->name('account');
Route::get('/accounts/{account}', 'AccountsController@show')->name('account');

Route::post('/accounts', 'AccountsController@store')->name('account');

Route::post('/deposit', 'DepositsController@store')->name('account');
Route::post('/withdraw', 'WithdrawalsController@store')->name('account');

Route::get('/wallets', 'WalletsController@index')->name('wallets');
Route::post('/wallets', 'WalletsController@store')->name('wallets');

Route::get('/buy', 'BuysController@index')->name('buy');
Route::post('/buy', 'BuysController@store')->name('buy');

Route::get('/sell', 'SellsController@index')->name('sell');
Route::post('/sell', 'SellsController@store')->name('sell');

Route::get('/commissions', 'CommissionsController@index')->name('commissions');
