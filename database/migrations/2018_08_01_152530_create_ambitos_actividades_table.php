<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbitosActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambitos_actividades', function (Blueprint $table){
            
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
              
                
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambitos_actividades');
    }
}
