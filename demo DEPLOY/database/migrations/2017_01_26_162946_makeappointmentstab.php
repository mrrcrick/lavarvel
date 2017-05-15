<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Makeappointmentstab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->decimal('hours');
            $table->bigInteger('employee_id');
			$table->bigInteger('shift_id');
            $table->dateTime('slotstart');
			$table->dateTime('slotfinish');
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
        Schema::dropIfExists('appointments');
    }
}
