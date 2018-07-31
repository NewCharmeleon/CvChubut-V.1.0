<?php

use Illuminate\Database\Seeder;
use App\Carrera;
use Faker\Factory as Faker;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_Es');
        //Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 9; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Carrera::create(
            [
                'nombre' => $faker->realText($maxNbChars = 50),
                'cantidad_materias' => $faker->numberBetween(2,10)
            ]);
        }
    }
}
