<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferentesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('referentes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('persona_id')->unsigned();
      $table->integer('actividad_id')->unsigned();
      $table->timestamps();

      $table->foreign('persona_id')->references('id')->on('personas')
            ->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('actividad_id')->references('id')->on('actividades')
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
    Schema::drop('referentes');
  }
}
