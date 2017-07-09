<?php

namespace App;

use App\Coin;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id','status'
];

	public function buys()
	{
		return $this->hasManyThrough('App\Buy', 'App\Wallet');
	}

	public function sells()
	{
		return $this->hasManyThrough('App\Sell', 'App\Wallet');
	}

	public function unrealizedGains()
	{
		$funds =  $this->with('deposits','withdrawals')->find($this->id) ;		
		$allDeposits = $funds->deposits->where('status','trades')->sum('amount');
		$allWithdrawals = $funds->withdrawals->where('status','trades')->sum('amount');

		return ($allDeposits - $allWithdrawals);
	}
    
    public function coins()
	{
//		$coin = new Coin();
//		return Coin::all();
		return $this->with('wallets.coin')->find($this->id)->wallets->keyBy('coin.name');
	}	

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function withdrawals()
	{
		return $this->hasMany(Withdrawal::class);
	}
	
	public function deposits()
	{
		return $this->hasMany(Deposit::class);
	}

	
	public function wallets()
	{
		return $this->hasMany(Wallet::class);
	}
}
