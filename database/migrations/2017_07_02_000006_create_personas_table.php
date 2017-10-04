<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->primary('id_user');
            $table->string('nombre');
            //$table->integer('id_user')->unsigned();
            $table->string('dni', 9)->unique();
            $table->string('nacionalidad', 20);
            $table->string('direccion', 20);
            $table->date('fecha_nac');
            $table->string('telefono', 15);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')
              ->onUpdate('cascade')->onDelete('cascade');

          //  $table->foreign('user_id')->references('id')->on('users')
            //    integer('persona_id')->unsigned()->onDelete('cascade');

            //$table->primary(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
