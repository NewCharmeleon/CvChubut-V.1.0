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
            $table->integer('id_persona')->unsigned();
            $table->primary('id_persona');
            $table->integer('id_carrera')->unsigned();
            $table->integer('id_actividad')->unsigned();
            $table->timestamps();

            $table->foreign('id_persona')->references('id_user')->on('personas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_carrera')->references('id')->on('carreras')
              ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_actividad')->references('id')->on('actividades')
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
