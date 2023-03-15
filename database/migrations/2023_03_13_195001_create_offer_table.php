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
        Schema::create('offer', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('type', 50);
            $table->float('duration');
            $table->longText('skills');
            $table->float('salary');
            $table->date('release_date');
            $table->integer('number_of_places');
            $table->longText('description');
            $table->bigInteger('id_Company')->unsigned();
            $table->bigInteger('id_Address')->unsigned();
            $table->foreign('id_Company') ->references('id')->on('Company');
            $table->foreign('id_Address') ->references('id')->on('address');
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
        
        Schema::dropIfExists('offer');
    }
};
