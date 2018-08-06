<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ExperienciaLaboral;
use App\Persona;

class ExperienciasLaboralesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExperienciaLaboral::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_ES');
        //Averiguamos cuantas Personas tenemos
        $cuantos=Persona::all()->count();
        //Creamos bucle para cubrir N Experiencias Laborales
        for ($i=0;$i <10; $i++)
        {
            //llamamos al Metodo Create del Modelo
            ExperienciaLaboral::create(
            [

                'puesto' => $faker->realText($maxNBChars = 30),
                'descripcion_de_tareas' => $faker->realText($maxNBChars = 100),
                'fecha_ini' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'fecha_ini'),
                'empleador' => $faker->realText($maxNBChars = 50),
                'localidad' => $faker->realText($maxNBChars = 50),
                'provincia' => $faker->realText($maxNBChars = 50),
                'referencia' => $faker->realText($maxNBChars = 50),
                'rentado' => $faker->boolean(),
                'persona_id' => $faker->numberBetween($min=0, $cuantos),
            ]);
        };
    }
}
