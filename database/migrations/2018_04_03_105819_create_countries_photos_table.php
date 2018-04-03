<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_photos', function (Blueprint $table) {
         $table->increments('Countries_photo_id')->unsigned()->index();
         $table->integer('Countries_id');
         $table ->foreign('Countries_id')->references('Countries_id')->on('Countries');
         $table->string('Countries_photo_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries_photos');
    }
}
