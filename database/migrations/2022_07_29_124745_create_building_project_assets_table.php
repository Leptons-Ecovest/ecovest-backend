<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingProjectAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_project_assets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('building_project_id')->unsigned();
            $table->string('media_type');
            $table->string('media_url');
            $table->string('status');
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
        Schema::dropIfExists('building_project_assets');
    }
}
