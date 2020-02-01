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
            $table->string('estado');
            $table->string('observacions')->nullable();
            $table->integer('dietista_id');
            $table->integer('idcliente');
            $table->integer('peso')->nullable();
            $table->integer('imc')->nullable();
            $table->integer('pcgrasa')->nullable();
            $table->integer('pcauga')->nullable();
            $table->integer('pcmasamusc')->nullable();
            $table->integer('pcmedperna')->nullable();
            $table->integer('pcmedcadera')->nullable();
            $table->integer('pcmedcintura')->nullable();
            $table->integer('pcmedpeito')->nullable();
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
