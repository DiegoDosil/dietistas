<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hora');
            $table->string('fecha');
            $table->string('localizacion');
            $table->string('observacions');
            $table->integer('dietista_id');
            $table->integer('idcliente');
            $table->integer('peso');
            $table->integer('imc');
            $table->integer('pcgrasa');
            $table->integer('pcauga');
            $table->integer('pcmasamusc');
            $table->integer('pcmedperna');
            $table->integer('pcmedcadera');
            $table->integer('pcmedcintura');
            $table->integer('pcmedpeito');
            $table->timestamp('updated_at')->nullable();            
            $table->timestamp('created_at')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
