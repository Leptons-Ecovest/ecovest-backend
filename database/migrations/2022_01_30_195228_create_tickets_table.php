<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
           
            $table->string('title');
            $table->longText('body');
            $table->string('department');
            $table->string('status')->default('open');
            $table->string('ticket_no');

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('responded_by')->unsigned()->nullable();
  
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('responded_by')->references('id')->on('users');
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
        Schema::dropIfExists('tickets');
    }
}
