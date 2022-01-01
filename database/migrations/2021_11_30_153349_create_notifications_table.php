<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('performed_by')->unsigned();
            $table->string('type')->default('unique');
            $table->string('status')->default('unread');
            $table->string('title');
            $table->string('log');
            $table->bigInteger('performed_to')->unsigned()->nullable();

            $table->foreign('performed_by')->references('id')->on('users');
            $table->foreign('performed_to')->references('id')->on('users');
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
        Schema::dropIfExists('notifications');
    }
}
