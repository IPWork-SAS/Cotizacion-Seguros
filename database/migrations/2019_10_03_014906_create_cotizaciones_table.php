<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->bigIncrements('id_cotizacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('valor_dia',100);
            $table->string('valor_total');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_aseguradora');
            $table->unsignedBigInteger('id_plan');
            $table->unsignedBigInteger('id_rango_edad');
            $table->unsignedBigInteger('id_valor');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_aseguradora')->references('id_aseguradora')->on('aseguradoras')->onDelete('cascade');
            $table->foreign('id_plan')->references('id_plan')->on('planes')->onDelete('cascade');
            $table->foreign('id_rango_edad')->references('id_rango_edad')->on('rango_edades')->onDelete('cascade');
            $table->foreign('id_valor')->references('id_valor')->on('valores')->onDelete('cascade');
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
        Schema::dropIfExists('cotizaciones');
    }
}
