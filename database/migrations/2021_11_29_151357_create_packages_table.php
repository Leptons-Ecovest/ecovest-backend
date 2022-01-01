<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('reg_fee');
            $table->integer('grade');
            $table->integer('points');
            $table->double('dr_commission');
            $table->double('second_indr_commission');
            $table->double('third_indr_commission');
            $table->double('three_one_commission');
            $table->double('match_bonus');
            $table->integer('max_daily_matching');
            $table->string('featured_logo');
            $table->string('title');
            $table->string('description');
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
        Schema::dropIfExists('packages');
    }
}
