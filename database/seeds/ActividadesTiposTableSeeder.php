<?php

use Illuminate\Database\Seeder;
use App\ActividadTipo;
use Faker\Factory as Faker;
class ActividadesTiposTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActividadTipo::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_Es');
        //Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 25; $i++)
        {
            //llamamos al Metodo Create del Modelo
            ActividadTipo::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);
        }
    }
}
