<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_stages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('payment_plans_id')->unsigned();
            $table->integer('stage')->default(1);
            $table->integer('percent')->default(100);
            $table->integer('amount')->default(1000000);
            $table->integer('amount_remitted')->default(0);
            $table->string('status')->default('active');

            $table->string('aboundary_date')->nullable();
            $table->string('bboundary_date')->nullable();

            $table->foreign('payment_plans_id')->references('id')->on('payment_plans');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('payment_stages');
    }
}
