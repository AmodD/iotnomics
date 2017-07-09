<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
	public function commissionable()
	{
		return $this->morphTo();
	}

	public function buy()
	{
		return $this->belongsTo(Buy::class);
	}
	
	public function sell()
	{
		return $this->belongsTo(Sell::class);
	}
}
