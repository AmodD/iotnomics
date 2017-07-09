<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id');
	    $table->decimal('value',12,2)->default(0.00);
            $table->string('status'); // 
            $table->timestamps();
	});

//	DB::update("ALTER TABLE accounts AUTO_INCREMENT = 7500;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
