<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use Faker\Factory as Faker;

class PersonasTableSeeder extends Seeder
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
    $cuantos=User::all()->count();
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      Persona::create(
      [
        'user_id'=>$faker->unique($reset = true)->numberBetween($min=1, $cuantos),
        'nombre'=>$faker->name(),
        'dni'=>$faker->unique($reset = true)->numberBetween($min = 10000000, $max = 45000000),
        'nacionalidad'=>$faker->word(),
        'direccion'=>$faker->word(),
        'fecha_nac'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'telefono'=>$faker->unique($reset = true)->numberBetween($min = 2804000000, $max = 2804999999)
      ]);
    }
  }
}
