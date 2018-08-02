<?php

use Illuminate\Database\Seeder;

class ParticipacionesTiposTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParticipacionTipo::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_Es');
        //Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 25; $i++)
        {
            //llamamos al Metodo Create del Modelo
            ParticipacionTipo::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);
        }
    }
}
