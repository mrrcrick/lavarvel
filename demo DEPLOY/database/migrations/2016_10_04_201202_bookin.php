<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bookin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookins', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->dateTime('slotstart');
			$table->dateTime('slotfinish');
			$table->string('employee');
			$table->index('slotstart');
			$table->index('slotfinish');

			
			
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookins');
    }
}
