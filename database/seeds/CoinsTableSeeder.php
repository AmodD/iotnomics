<?php

use Illuminate\Database\Seeder;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('coins')->insert([

	[ 'name' => 'Bitcoin' , 'code' => 'BTC'],
	[ 'name' => 'Ether' , 'code' => 'ETH'],
	[ 'name' => 'Ripple' , 'code' => 'XRP'],
	[ 'name' => 'Lumen' , 'code' => 'XLM']

	]);
    }
}
