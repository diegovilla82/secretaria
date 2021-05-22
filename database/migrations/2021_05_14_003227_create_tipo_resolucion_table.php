<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoResolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_resolucion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('agente')->default(false);
            $table->boolean('anio')->default(false);
            $table->boolean('beneficiario')->default(false);
            $table->boolean('detalle')->default(false);
            $table->boolean('dias')->default(false);
            $table->boolean('entidad')->default(false);
            $table->boolean('exp_act')->default(false);
            $table->boolean('obra')->default(false);
            $table->boolean('monto')->default(false);
            $table->boolean('numero')->default(false);
            $table->boolean('programa')->default(false);
            $table->boolean('localidad')->default(false);
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
        Schema::dropIfExists('tipo_resolucion');
    }
}
