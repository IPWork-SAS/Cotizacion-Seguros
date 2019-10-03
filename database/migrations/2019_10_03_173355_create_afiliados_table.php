<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->bigIncrements('id_afiliados');
            $table->string('nombre_afiliado');
            $table->string('edad_afiliado');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_cotizacion')->references('id_cotizacion')->on('cotizaciones')->onDelete('cascade');
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
        Schema::dropIfExists('afiliados');
    }
}
