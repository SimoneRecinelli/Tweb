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
        Schema::create('Organizzazione', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Username', 25);
            $table->bigInteger('IdOfferta')->unsigned();
            $table->timestamps();

            $table->foreign('Username')->references('Username')->on('Users');
            $table->foreign('IdOfferta')->references('IdOfferta')->on('Offerte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Organizzazione');
    }
};
