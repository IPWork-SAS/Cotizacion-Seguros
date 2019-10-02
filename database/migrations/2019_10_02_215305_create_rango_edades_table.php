<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangoEdadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('rango_edades', function (Blueprint $table) {
            $table->bigIncrements('id_rango_edad');
            $table->string('edad_inicial');
            $table->string('edad_final');
            $table->foreign('id_aseguradora')->references('id_aseguradora')->on('aseguradoras');
            $table->foreign('id_plan')->references('id_plan')->on('planes')->onDelete('cascade');
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
        Schema::dropIfExists('rango_edades');
    }
}
