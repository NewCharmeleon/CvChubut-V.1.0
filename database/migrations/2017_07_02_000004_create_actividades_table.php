<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('actividades', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('act_tipo_id')->unsigned();
          $table->string('nombre');
          $table->string('descripcion');
          //$table->integer('act_esp_id')->unsigned();
          $table->timestamps();

          $table->foreign('act_tipo_id')->references('id')->on('actividades_tipo')
              ->onUpdate('cascade')->onDelete('cascade');
        //  $table->foreign('act_esp_id')->references('id')->on('actividades_especifica')
        //          ->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
