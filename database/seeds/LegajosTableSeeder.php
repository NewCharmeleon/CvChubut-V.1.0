<?php

use Illuminate\Database\Seeder;
use App\Legajo;
use Faker\Factory as Faker;

class LegajosTableSeeder extends Seeder
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
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      Legajo::create(
      [
        'descripcion'=>$faker->text($maxNbChars = 250)
      ]);
    }
  }
}
