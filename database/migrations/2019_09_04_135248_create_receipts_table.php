<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('receipt_id');
            $table->dateTime('receipt_at');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('workpiece_id');
            $table->integer('receipt_price');
            $table->integer('receipt_amount');
            $table->integer('receipt_total');
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
        Schema::dropIfExists('receipts');
    }
}
