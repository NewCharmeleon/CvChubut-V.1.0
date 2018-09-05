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
                ->string('nombre', 250);
                
            $table
                ->string('localidad')
                ->nullable()
                ->default( null );
                
            $table
                ->string('provincia')
                ->nullable()
                ->default( null );
            
                $table
                ->string('pais')
                ->nullable()
                ->default( null );    
                
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
