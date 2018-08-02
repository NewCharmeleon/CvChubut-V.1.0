<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_tipo', function (Blueprint $table){
            $table
                ->increments('id');

            $table
                ->string('nombre')
                ->unique();
             
            $table
                ->string('descripcion')
                ->nullable()
                ->default('');
                
            $table
                ->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_tipo');
    }
}
