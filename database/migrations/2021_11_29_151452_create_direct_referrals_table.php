<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_referrals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('referrer_id')->unsigned();
            $table->bigInteger('referree_id')->unsigned();
            $table->string('referrer_usercode');
            $table->string('referree_usercode');
     
            $table->integer('weekInYear');
            $table->bigInteger('referrer_package_id')->unsigned()->nullable();
            $table->bigInteger('referree_package_id')->unsigned()->nullable();
            $table->bigInteger('user_wallet_id')->unsigned()->nullable();
            $table->integer('referrer_bonus')->nullable();
            $table->integer('referral_points')->nullable();

            $table->string('status')->default('active');

            $table->foreign('referrer_package_id')->references('id')->on('packages');
            $table->foreign('referree_package_id')->references('id')->on('packages');
            $table->foreign('user_wallet_id')->references('id')->on('user_wallets');
            $table->foreign('referrer_id')->references('id')->on('users');
            $table->foreign('referree_id')->references('id')->on('users');
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
        Schema::dropIfExists('direct_referrals');
    }
}
