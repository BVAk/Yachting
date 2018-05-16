<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->increments('Comments_id');
            $table->integer('Comments_id_user');
            $table ->foreign('Comments_id_user')->references('id')->on('Users');
            $table->integer('Comments_id_yacht');
            $table ->foreign('Comments_id_yacht')->references('Yachts_id')->on('Yachts');
            $table->string('Comments_comment');
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
        Schema::dropIfExists('comments');
    }
}
