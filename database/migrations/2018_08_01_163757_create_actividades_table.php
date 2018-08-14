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
                ->integer('institucion_id')
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
                ->string('nombre')->unique();

            $table
                ->integer('actividad_tipo_id')
                ->unsigned(); 
            $table
                ->foreign('actividad_tipo_id')
                ->references('id')
                ->on('actividades_tipos');  

            $table
                ->integer('ambito_actividad_id')
                ->unsigned(); 
            $table
                ->foreign('ambito_actividad_id')
                ->references('id')
                ->on('ambitos_actividades');    
                
            $table
                ->integer('tipo_participacion_id')
                ->unsigned(); 
            $table
                ->foreign('tipo_participacion_id')
                ->references('id')
                ->on('tipos_participaciones'); 
            
            $table
                ->integer('modalidad_id')
                ->unsigned(); 
            $table
                ->foreign('modalidad_id')
                ->references('id')
                ->on('modalidades');     
            
            $table
                ->date('fecha_ini')
                ->nullable()
                ->default(null);
            
            $table
                ->date('fecha_fin')
                ->nullable()
                ->default(null);

            $table
                ->integer('duracion')
                ->unsigned()
                ->default(0);

            $table
                ->string('referente')
                ->default('');
                
            $table
                ->string('lugar')
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
        Schema::dropIfExists('actividades');
    }
}
