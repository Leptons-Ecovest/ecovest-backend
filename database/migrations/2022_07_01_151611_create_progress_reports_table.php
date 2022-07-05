<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_plan_id')->unsigned();
            $table->bigInteger('subscriber_id')->unsigned();
            $table->bigInteger('reporter_id')->unsigned();

            $table->string('description_work');
            $table->string('issues');
            $table->string('stage');

            $table->integer('percentage_completion');

            $table->foreign('payment_plan_id')->references('id')->on('payment_plans');
            $table->foreign('subscriber_id')->references('id')->on('users');
            $table->foreign('reporter_id')->references('id')->on('users');

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
        Schema::dropIfExists('progress_reports');
    }
}
