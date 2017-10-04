<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesEspecificaTable extends Migration
{

    public function up()
    {
        Schema::create('actividades_especifica', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->string('instancia');
            $table->string('puesto_mencion');
            $table->string('inst_referente');
            $table->string('inst_oferente');
            $table->string('lugar');
            $table->timestamps();

            // Añadimos la clave foránea con Fabricante.
fabricante_id
// Acordarse de añadir al array protected $fillable
del fichero de modelo "Avion.php" la nueva columna:
// protected $fillable =
array('modelo','longitud','capacidad','velocidad','alcance','fabricante_id');
$table->integer('fabricante_id')->unsigned();
// Indicamos cual es la clave foránea de esta tabla:
$table->foreign('fabricante_id')->references('id')->on('fabricantes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actividades_especifica');
    }
}
