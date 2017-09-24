<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imagelocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::dropIfExists('Imagelocations');
        Schema::create('Imagelocations', function (Blueprint $table) {

            $table->integer('id')->unsigned();
            $table->text('location');
             $table->foreign('id')->references('id')->on('createposts')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();});
    }
     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('Imagelocations');
    }
}
