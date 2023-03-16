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
        Schema::create('follow', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('id_User')->unsigned();
            $table->foreign('id_User') ->references('id')->on('users');
            $table->foreign('id') ->references('id')->on('offer');

            $table->primary(['id', 'id_User']);
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

        Schema::dropIfExists('follow');

    }
};
