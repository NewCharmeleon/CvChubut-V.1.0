<?php

use Illuminate\Database\Seeder;
use App\AmbitoActividad;
use Faker\Factory as Faker;

class AmbitosActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AmbitoActividad::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_Es');
        //Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 2; $i++)
        {
            //llamamos al Metodo Create del Modelo
            AmbitoActividad::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);
        }
    }
}
