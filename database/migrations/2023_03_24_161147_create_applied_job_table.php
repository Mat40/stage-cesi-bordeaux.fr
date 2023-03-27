<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     public function up()
     {
         Schema::create('applied_job', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('user_id');
             $table->unsignedBigInteger('offer_id');
             $table->timestamps();

             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('offer_id')->references('id')->on('offer');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('applied_job');
     }
};
