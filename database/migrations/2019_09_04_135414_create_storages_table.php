<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->bigIncrements('storage_id');
            $table->dateTime('storage_at');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('workpiece_id');
            $table->integer('storage_amount');
            // $table->integer('storage_total');
            $table->boolean('status');//原本是finished
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
        Schema::dropIfExists('storages');
    }
}
