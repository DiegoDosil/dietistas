<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioalteracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioalteracions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('usuario_id');
            $table->integer('alteracion_id');
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
        Schema::dropIfExists('usuarioalteracions');
    }
}
