<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_plans_id')->unsigned();

            $table->date('payment_due_date');

            $table->integer('expected_amount');
            $table->integer('amount_paid');

            $table->string('status')->default('unpaid');

            $table->string('color_code')->default('secondary');

            $table->foreign('payment_plans_id')->references('id')->on('payment_plans');
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
        Schema::dropIfExists('payment_schedules');
    }
}
