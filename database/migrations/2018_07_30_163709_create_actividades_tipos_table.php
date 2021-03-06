<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_tipos', function (Blueprint $table){
            $table
                ->increments('id');

            $table
                ->string('nombre')
                ->unique();
             
            $table
                ->text('descripcion')
                ->nullable();
              
            $table
            ->softDeletes(); //Columna para soft delete
              
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
        Schema::dropIfExists('actividades_tipos');
    }
}
