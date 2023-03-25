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
        Schema::create('part_of', function (Blueprint $table) {

            $table->bigInteger('id')->unsigned();
            $table->bigInteger('id_Company')->unsigned();

            $table->foreign('id_Company') ->references('id')->on('company')->onDelete('cascade');;
            $table->foreign('id') ->references('id')->on('area_activity')->onDelete('cascade');;

            $table->timestamps();
            $table->primary(['id', 'id_Company']);

          
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('part_of');
    }
};
