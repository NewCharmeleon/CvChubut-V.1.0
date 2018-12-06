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
        Schema::create('personas', function (Blueprint $table)
        {
            
            $table
                ->increments('id');
            
            $table
                ->string('nombre_apellido', 45);

            $table
                ->string('dni');

            $table
                ->string('nacionalidad')
                ->default('n/c');
            
            $table  
                ->date('fecha_nac')
                ->nullable();

            $table
                ->string('telefono')
                ->nullable()
                ->default(''); 
                
            $table
                ->integer('user_id')
                ->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
                
            $table
                ->integer('carrera_id')
                ->unsigned()
                ->nullable()
                ->default( null );
            $table
                ->foreign('carrera_id')
                ->references('id')
                ->on('carreras');
            
            $table
                ->string('materias_aprobadas')
                ->default('n/c');   
            
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
        
        Schema::dropIfExists('personas');
        
    }
}
