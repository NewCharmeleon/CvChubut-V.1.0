<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->integer('actividad_id')->unsigned();
            $table->integer('legajo_id')->unsigned();
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('carrera_id')->references('id')->on('carreras')
              ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('actividad_id')->references('id')->on('actividades')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('legajo_id')->references('id')->on('legajos')
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
        Schema::drop('estudiantes');
    }
}
