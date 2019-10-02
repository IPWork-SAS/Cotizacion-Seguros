<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->bigIncrements('id_cotizacion');
            $table->string('valor_dia');
            $table->string('valor_total');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_aseguradora')->references('id_aseguradora')->on('aseguradoras')->onDelete('cascade');
            $table->foreign('id_plan')->references('id_plan')->on('planes')->onDelete('cascade');
            $table->foreign('id_edad')->references('id_edad')->on('edades')->onDelete('cascade');
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
