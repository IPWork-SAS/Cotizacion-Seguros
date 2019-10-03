<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_seguros', function (Blueprint $table) {
            $table->bigIncrements('id_valor_seguro');
            $table->string('valor_seguro',100);
            $table->unsignedBigInteger('id_plan');
            $table->unsignedBigInteger('id_aseguradora');
            $table->foreign('id_plan')->references('id_plan')->on('planes')->onDelete('cascade');
            $table->foreign('id_aseguradora')->references('id_aseguradora')->on('aseguradoras')->onDelete('cascade');
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
        Schema::dropIfExists('valor_seguros');
    }
}
