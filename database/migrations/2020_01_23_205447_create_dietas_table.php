<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->integer('dietista_id');
            $table->integer('auga');
            $table->integer('kcal');
            $table->integer('proteinas');
            $table->integer('fibra');
            $table->integer('sodio');
            $table->integer('potasio');
            $table->integer('calcio');
            $table->integer('fosforo');
            $table->integer('ferro');
            $table->integer('magnesio');
            $table->integer('monoinsat');
            $table->integer('poliinsat');
            $table->integer('hidratoscarbono');
            $table->integer('colesterol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dietas');
    }
}
