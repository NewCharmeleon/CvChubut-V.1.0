<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposParticipacionesTable extends Migration
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_participaciones', function (Blueprint $table){
            
            $table
                ->increments('id');

            $table
                ->string('nombre')
                ->unique();
                
            $table
                ->string('descripcion')
                ->nullable()
                ->default('');
                
                
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
        Schema::dropIfExists('tipos_participaciones');
    }
}
