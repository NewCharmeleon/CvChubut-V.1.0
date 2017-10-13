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
          $table->integer('id_act_tipo')->unsigned();
          $table->string('nombre');
          $table->string('descripcion');
          $table->integer('id_act_esp')->unsigned();
          $table->timestamps();

          $table->foreign('id_act_tipo')->references('id')->on('actividades_tipo')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('id_act_esp')->references('id')->on('actividades_especifica')
                  ->onUpdate('cascade')->onDelete('cascade');
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
