<?php

namespace App\Console\Commands;

use App\Spread;
use Illuminate\Console\Command;

class GetSpread extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spread:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'When fired will get buy and sell values';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
		Spread::create([
			"exchange_id" => 1,
			"coin_id" => 1,
			"buy" => file_get_contents("https://www.unocoin.com/trade?buy"),
			"sell" => file_get_contents("https://www.unocoin.com/trade?sell"),
			"avg" => file_get_contents("https://www.unocoin.com/trade?avg")	
		]);
    }
}
