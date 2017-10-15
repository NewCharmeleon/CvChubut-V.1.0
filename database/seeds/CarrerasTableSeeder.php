<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
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


      //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder

      for ($i=0; $i<9; $i++)
      {
          //llamamos al Metodo Create del Modelo para crear una nueva fillable
          Carrera::create(
            [
              'descripcion'=>$faker->text($maxNbChars = 255)
            ]
          );
        }
    }
}
