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
        Schema::create('located_at', function (Blueprint $table) {
            $table->bigInteger('id_Company')->unsigned();
            $table->bigInteger('id')->unsigned();
            $table->foreign('id_Company') ->references('id')->on('Company')->onDelete('cascade');
            $table->foreign('id') ->references('id')->on('address')->onDelete('cascade');

            $table->primary(['id', 'id_Company']);
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
       
        Schema::dropIfExists('located_at');
    }
};
