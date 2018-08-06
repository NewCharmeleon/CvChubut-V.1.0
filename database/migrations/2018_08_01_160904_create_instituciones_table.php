<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituciones', function(Blueprint $table)
        {
          
            $table
                ->increments('id');

            $table
                ->string('nombre');
                
            $table
                ->string('localidad');
                
            $table
                ->string('provincia');
            
                $table
                ->string('pais');    
                
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
        Schema::dropIfExists('instituciones');
    }
}
