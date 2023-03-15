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
        Schema::create('CV', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 50);
            $table->string('file_path', 50);  
            $table->bigInteger('id_User')->unsigned();
            $table->foreign('id_User') ->references('id')->on('user');
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
   
        Schema::dropIfExists('CV');
    }
};
