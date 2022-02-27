<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('residential_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            
            $table->string('nok_name')->nullable();
            $table->string('nok_email')->nullable();
            $table->string('nok_phone')->nullable();
            $table->string('nok_address')->nullable();

            $table->string('nin')->nullable();
            $table->string('dob')->nullable();
            

            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('auth_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('status')->default('active');

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
        Schema::dropIfExists('user_profiles');
    }
}
