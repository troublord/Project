<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkpiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workpieces', function (Blueprint $table) {
            $table->bigIncrements('workpiece_id');
            $table->string('workpiece_name');
            $table->string('workpiece_price');
            $table->integer('workpiece_formation');
            $table->integer('in_stock');
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
        Schema::dropIfExists('workpieces');
    }
}
