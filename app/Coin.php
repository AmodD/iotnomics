<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
	public function buys()
	{
		return $this->hasMany(Buy::class);
	}
	
	public function wallets()
	{
		return $this->hasMany(Wallet::class);
	}
}
