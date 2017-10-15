<?php

use Illuminate\Database\Seeder;
use App\Oferente;
use App\Persona;
use App\Actividad;
use Faker\Factory as Faker;

class OferentesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //Creamos instancia de Faker
    $faker = Faker::create('es_ES');
    //Averiguamos cuantas Actividades Tipo tenemos
    $cuantos=Persona::all()->count();
    $cuantos1=Actividad::all()->count();
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      Oferente::create(
      [
        'persona_id'=>$faker->unique()->numberBetween($min=1, $cuantos),
        'actividad_id'=>$faker->unique()->numberBetween($min=1, $cuantos1)
      ]);
    }
  }
}
