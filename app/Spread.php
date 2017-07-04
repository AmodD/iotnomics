<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spread extends Model
{
    //
    protected $fillable = [ 'exchange_id', 'coin_id', 'buy', 'sell' , 'avg'];

    public function exchange()
    {
		return $this->belongsTo(Exchange::class);
    }

    public function coin()
    {
		return $this->belongsTo(Coin::class);
    }

}
