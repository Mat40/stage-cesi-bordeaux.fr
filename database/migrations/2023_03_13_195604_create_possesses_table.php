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
        Schema::create('possesses', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('id_Area_activity')->unsigned();

            $table->foreign('id_Area_activity') ->references('id')->on('area_activity');
            $table->foreign('id') ->references('id')->on('offer');
           
            $table->timestamps();

            $table->primary(['id', 'id_Area_activity']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
 
        Schema::dropIfExists('possesses');
    }
};
