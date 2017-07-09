<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'account_id','amount','status'
];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
