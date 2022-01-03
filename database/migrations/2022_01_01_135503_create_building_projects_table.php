<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('apartment_size');
            $table->string('payment_plan');
            $table->string('property_price');
            $table->longText('facilities');
            $table->longText('estate_facilities')->nullable();
            $table->integer('duration')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('building_projects');
    }
}
