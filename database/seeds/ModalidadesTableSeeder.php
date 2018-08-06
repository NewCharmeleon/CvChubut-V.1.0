<?php

use Illuminate\Database\Seeder;
use App\Modalidad;
use Faker\Factory as Faker;

class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::truncate();
        $faker = Faker::create('es_ES');
        //Creamos el bucle para cubrir N Modalidades
        for ($i=0; $i<3; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Modalidad::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);

        }
    }
}
