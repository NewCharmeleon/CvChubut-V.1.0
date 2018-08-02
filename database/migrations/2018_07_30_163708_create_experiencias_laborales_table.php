<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias_laborales', function(Blueprint $table)
        {
          
            $table
                ->increments('id');

            $table
                ->string('puesto');
                
            $table
                ->string('descripcion_de_tareas');
                
            $table
                ->date('fecha_ini')
                ->nullable()
                ->default(null);
            
            $table
                ->date('fecha_fin')
                ->nullable()
                ->default(null);

            $table
                ->string('empleador');
                
            $table
                ->string('localidad');
                
            $table
                ->string('provincia');
            
            $table
                ->string('referencia')
                ->default('');

            $table
                ->boolean('rentado');

            $table
                ->boolean('mostrar_cv')
                ->default(true);    
                
            $table
                ->integer('persona_id')
                ->unsigned();
                
            $table
                ->foreign('persona_id')
                ->references('id')
                ->on('personas');
                
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
        Schema::dropIfExists('experiencias_laborales');    
    }
}
