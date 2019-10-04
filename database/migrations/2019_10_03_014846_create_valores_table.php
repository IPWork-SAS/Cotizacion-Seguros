<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valores', function (Blueprint $table) {
            $table->bigIncrements('id_valor');
            $table->string('valor',100);
            $table->unsignedBigInteger('id_rango_edad');
            $table->unsignedBigInteger('id_valor_seguro');
            $table->foreign('id_rango_edad')->references('id_rango_edad')->on('rango_edades')->onDelete('cascade');
            $table->foreign('id_valor_seguro')->references('id_valor_seguro')->on('valor_seguros')->onDelete('cascade');
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
        Schema::dropIfExists('valores');
    }
}
