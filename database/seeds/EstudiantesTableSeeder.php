<?php

use Illuminate\Database\Seeder;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Creamos instancia de Faker
      $faker = Faker::create();

      //Averiguamos cuantas Actividades Tipo tenemos
      $cuantos=Persona::all()->count;
      $cuantos1=Carrera::all()->count;
      $cuantos2=Actividad::all()->count;
      $cuantos3=Legajo::all()->count;


      //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder

      for ($i=0; $i<9; $i++)
      {
          //llamamos al Metodo Create del Modelo para crear una nueva fillable
          Estudiante::create(
            [
              'persona_id'=>$faker->unique()->numberBetween(1, $cuantos),
              'carrera_id'=>$faker->unique()->numberBetween(1, $cuantos1),
              'actividad_id'=>$faker->unique()->numberBetween(1, $cuantos2),
              'legajo_id'=>$faker->unique()->numberBetween(1, $cuantos3)
            ]
          );
        }
    }
}
