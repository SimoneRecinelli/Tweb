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
        Schema::create('Offerte', function (Blueprint $table) {
            $table->bigIncrements('idOfferta');
            $table->string('DescrizioneOfferta',15000);
            $table->string('Categoria',50);
            $table->date('Scadenza',25);
            $table->string('Oggetto',100);
            $table->string('NomeAzienda',25);
            $table->foreign('NomeAzienda',25)->references('NomeAzienda')->on('Aziende')->onDelete('cascade');
            $table->float('Prezzo')->unsigned();
            $table->tinyInteger('PercentualeSconto')->unsigned();
            $table->string('Luogo',50);
            $table->string('Modalità',50);
            $table->string('Evidenza',10);
            $table->text('image')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Offerte');
    }
};
