<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRTVRSEnumerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_t_v_r_s_enumerations', function (Blueprint $table) {
            $table->id();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('town')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('hotel_manager')->nullable();
            $table->string('hotel_manager_phone')->nullable();
            $table->string('hotel_manager_email')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->integer('swimming_pools')->nullable();
            $table->integer('reception')->nullable();
            $table->integer('bar')->nullable();
            $table->integer('lounge')->nullable();
            $table->string('reporters_email');
            $table->string('status')->default('submitted');

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
        Schema::dropIfExists('r_t_v_r_s_enumerations');
    }
}
