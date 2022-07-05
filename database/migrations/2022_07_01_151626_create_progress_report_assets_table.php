<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_report_assets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('progress_report_id')->unsigned();
            $table->string('media_type');
            $table->string('media_url');
            $table->string('status');
            $table->foreign('progress_report_id')->references('id')->on('progress_reports');
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
        Schema::dropIfExists('progress_report_assets');
    }
}
