<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	return ;

        Schema::create('spreads', function (Blueprint $table) {
		$table->increments('id');
		$table->unsignedSmallInteger('exchange_id');
		$table->unsignedSmallInteger('coin_id');
		$table->unsignedMediumInteger('buy');
		$table->unsignedMediumInteger('sell');
		$table->unsignedMediumInteger('avg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    return;

        Schema::dropIfExists('spreads');
    }
}
