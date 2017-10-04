<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateOferentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('oferentes', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('id_persona')->nullable()->index();
          $table->integer('id_actividad')->unsigned();
          $table->timestamps();

          $table->foreign('id_persona')->references('id_user')->on('personas')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('id_actividad')->references('id')->on('actividades')
                    ->onUpdate('cascade')->onDelete('cascade');
      });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oferentes');
    }
}
