<?php

use Illuminate\Database\Seeder;

class ModalidadTableSeeder extends Seeder
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
        for ($i=0; $i<25; $i++)
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
