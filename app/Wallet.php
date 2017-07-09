<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'account_id','status','coin_id','quantity'
];

	public function buys()
	{
		return $this->hasMany(Buy::class);
	}
	
	public function sells()
	{
		return $this->hasMany(Sell::class);
	}
	
	public function account()
	{
		return $this->belongsTo(Account::class);
	}
	
	public function coin()
	{
		return $this->belongsTo(Coin::class);
	}

	public function balance($coin_id)
	{
		return $this->where([
			["coin_id", '=' , $coin_id],
			["account_id", '=' , auth()->user()->account()->first()->id]
		])->get();

	}
}
