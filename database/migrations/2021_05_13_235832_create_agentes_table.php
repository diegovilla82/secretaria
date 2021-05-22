<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('cuit')->nullable();
            $table->string('situacion_revista_id')->nullable();
            $table->string('escalafon_id')->nullable();
            $table->string('categoria_id')->nullable();
            $table->string('apartado')->nullable();
            $table->string('cargo_id')->nullable();
            $table->string('ceic')->nullable();
            $table->string('grupo')->nullable();
            $table->string('numero')->nullable();
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
        Schema::dropIfExists('agentes');
    }
}
