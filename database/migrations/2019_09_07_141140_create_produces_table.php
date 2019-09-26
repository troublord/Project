<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produces', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('workpiece_id');
            $table->dateTime('produce_date');
            $table->bigIncrements('produce_id');
            $table->integer('com_index');
            $table->integer('pro_index');
            $table->integer('pro_second');
            $table->integer('pro_period');
            $table->text('content')->nullable()->change();
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
        Schema::dropIfExists('produces');
    }
}
