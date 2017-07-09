<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
	//
	public function spreads()
	{
		$this->hasMany(Spread::class);
	}
}
