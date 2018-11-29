<?php

use Illuminate\Database\Seeder;
use App\Carrera;
use App\Persona;
use App\User;
//use App\Role;
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
    $cuantos1=Carrera::all()->count();
    //$cuantos2=Role::all()->count();
    //dd($cuantos);
    for ($i=0; $i<100; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      Persona::create(
      [
        'user_id'=>$cuantos+1,
        
        'nombre_apellido'=>$faker->name(),
        'dni'=>$faker->unique($reset = true)->numberBetween($min = 10000000, $max = 45000000),
        'nacionalidad'=>$faker->word(),
        //'direccion'=>$faker->word(),
        'fecha_nac'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'telefono'=>$faker->unique($reset = true)->numberBetween($min = 2804000000, $max = 2804999999),
        'carrera_id'=>$faker->numberBetween($min=1, $cuantos1),
        ]);
       // $rol_id=$faker->numberBetween($min=1, $cuantos2);
       // $user->attachRole( $rol_id );  
      
    }
  }
}

