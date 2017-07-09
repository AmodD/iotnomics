<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{


	public function coin()
	{
		return $this->belongsTo(Coin::class);
	}

	public function wallet()
	{
		return $this->belongsTo(Wallet::class);
	}

	public function commission()
	{
		return $this->morphOne(Commission::class,'commissionable');
	}
}
