<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolucionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolucion_detalles', function (Blueprint $table) {
            $table->id();
            $table->string('agente')->nullable();
            $table->string('empresa')->nullable();
            $table->string('entidad')->nullable();
            $table->string('numero')->nullable();
            $table->string('obra')->nullable();
            $table->string('beneficiario')->nullable();
            //$table->string('detalle')->nullable();
            $table->string('destino')->nullable();
            $table->string('monto')->nullable();
            $table->integer('resolucion_id')->nullable();
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
        Schema::dropIfExists('resolucion_detalles');
    }
}
