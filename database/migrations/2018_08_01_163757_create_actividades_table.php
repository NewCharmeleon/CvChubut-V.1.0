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
            
            $table
                ->increments('id');

            $table
                ->string('nombre');
            
            $table
                ->string('lugar');
            
            $table
                ->date('fecha_inicio');
                            
            $table
                ->date('fecha_fin')
                ->nullable()
                ->default( null );

            $table
                ->boolean('mostrar_cv')
                ->default( true );

            $table
                ->integer('institucion_id')
                ->nullable()
                ->unsigned();
            $table
                ->foreign('institucion_id')
                ->references('id')
                ->on('instituciones');    
                
            $table
                ->integer('persona_id')
                ->unsigned(); 
            $table
                ->foreign('persona_id')
                ->references('id')
                ->on('personas');       

            $table
                ->integer('actividad_tipo_id')
                ->nullable()
                ->unsigned(); 
            $table
                ->foreign('actividad_tipo_id')
                ->references('id')
                ->on('actividades_tipos');  

            $table
                ->integer('ambito_actividad_id')
                ->nullable()
                ->unsigned(); 
            $table
                ->foreign('ambito_actividad_id')
                ->references('id')
                ->on('ambitos_actividades');    
                
            $table
                ->integer('tipo_participacion_id')
                ->nullable()
                ->unsigned(); 
            $table
                ->foreign('tipo_participacion_id')
                ->references('id')
                ->on('tipos_participaciones'); 
            
            $table
                ->integer('modalidad_id')
                ->nullable()
                ->unsigned(); 
            $table
                ->foreign('modalidad_id')
                ->references('id')
                ->on('modalidades');     
            
            /*a verificar
            $table
                ->integer('duracion')
                ->unsigned()
                ->default(0);
            */
            /*a verificar 2
            $table
                ->string('referente')
                ->default('');
            */   
            
            
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
        Schema::dropIfExists('actividades');
    }
}
