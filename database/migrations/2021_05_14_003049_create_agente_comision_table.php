<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenteComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente_comision', function (Blueprint $table) {
            $table->id();
            $table->integer('agente_id')->nullable();
            $table->integer('comision_id')->nullable();
            $table->float('monto')->nullable();
            $table->boolean('chofer')->default(false);
            $table->string('vehiculo_pasaje')->nullable();
            $table->integer('gastos')->default(0);
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
        Schema::dropIfExists('agente_comision');
    }
}
