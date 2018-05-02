<?php

use Illuminate\Database\Seeder;
use App\Estudiante;
use App\Persona;
use App\Carrera;
use App\Actividad;
use App\Legajo;
use Faker\Factory as Faker;

class EstudiantesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   *
   */
  public function run()
  {
    //Creamos instancia de Faker
    $faker = Faker::create('es_ES');
    //Averiguamos cuantas Actividades Tipo tenemos
    $cuantos=Actividad::all()->count();
    $cuantos1=Legajo::all()->count();
    $cuantos2=Carrera::all()->count();
    $cuantos3=Persona::all()->count();
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      Estudiante::create(
      [
        'persona_id'=>$faker->unique($reset = true)->numberBetween($min=1,$cuantos3),
        'carrera_id'=>$faker->unique($reset = true)->numberBetween($min=1,$cuantos2),
        'actividad_id'=>$faker->unique($reset = true)->numberBetween($min=1,$cuantos),
        'legajo_id'=>$faker->unique($reset = true)->numberBetween($min=1,$cuantos1)


      ]);
    }
  }
}
