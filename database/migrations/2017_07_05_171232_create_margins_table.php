<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('margins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usdinr');
            $table->integer('profit');
            $table->integer('tax');
            $table->integer('exchange');
            $table->integer('fees');
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
        Schema::dropIfExists('margins');
    }
}
