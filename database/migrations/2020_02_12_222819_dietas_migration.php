<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DietasMigration extends Migration
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
            $table->string('observacions')->nullable();
            $table->integer('dietista_id');
            $table->integer('auga')->nullable();
            $table->integer('enerxia')->nullable();
            $table->integer('proteina')->nullable();
            $table->integer('fibra')->nullable();
            $table->integer('sodio')->nullable();
            $table->integer('potasio')->nullable();
            $table->integer('calcio')->nullable();
            $table->integer('fosforo')->nullable();
            $table->integer('ferro')->nullable();
            $table->integer('magnesio')->nullable();
            $table->integer('monoinsat')->nullable();
            $table->integer('poliinsat')->nullable();
            $table->integer('carbohidratos')->nullable();
            $table->integer('colesterol')->nullable();
            $table->integer('acidosgsaturados')->nullable();
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
        Schema::dropIfExists('dietas');
    }
}
