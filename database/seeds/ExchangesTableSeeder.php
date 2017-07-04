<?php

use Illuminate\Database\Seeder;

class ExchangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('exchanges')->insert([

	[ 'name' => 'UnoCoin' , 'description' => '', 'website' => 'https://www.unocoin.com/' ],
	[ 'name' => 'ZebPay' , 'description' => '', 'website' => 'https://www.zebpay.com/'],
	[ 'name' => 'Kraken' , 'description' => '', 'website' => 'https://www.zebpay.com/'],
	[ 'name' => 'CoinSecure' , 'description' => '', 'website' => 'https://coinsecure.in/']			

	]);
    }
}
