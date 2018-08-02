<?php

use Illuminate\Database\Seeder;

class AmbitoActividadTableSeeder extends Seeder
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
        for ($i = 0; $i < 25; $i++)
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
