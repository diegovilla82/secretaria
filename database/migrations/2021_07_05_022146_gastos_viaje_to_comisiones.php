<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GastosViajeToComisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comisiones', function (Blueprint $table) {
            $table->string('marca_modelo')->nullable();
            $table->string('patente')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comisiones', function (Blueprint $table) {
            //
        });
    }
}
