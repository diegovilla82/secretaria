<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_salida');
            $table
                ->boolean('externo')
                ->nullable()
                ->default(false);
            $table->string('destinos')->nullable();
            $table->integer('dias')->nullable();
            $table->float('combustible')->default(0);
            $table->string('act_exp')->nullable();
            $table->float('gastos')->default(0);
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
        Schema::dropIfExists('comisiones');
    }
}
