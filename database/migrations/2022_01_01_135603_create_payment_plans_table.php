<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('building_project_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->string('description')->nullable();
            $table->integer('total_amount');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('building_project_id')->references('id')->on('building_projects');
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
        Schema::dropIfExists('payment_plans');
    }
}
