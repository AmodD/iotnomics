<?php

use Illuminate\Database\Seeder;

class MarginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	 DB::table('margins')->insert([
	'usdinr' => 65,
	'profit' => 7,
	'tax' => 1,
	'exchange' => 2,
	'fees' => 3,
	]);
    }
}
