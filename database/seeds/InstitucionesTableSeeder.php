<?php

use Illuminate\Database\Seeder;
use App\Institucion;
use Faker\Factory as Faker;


class InstitucionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institucion::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_ES');
       
        //Creamos bucle para cubrir N Instituciones
        for ($i=0;$i <=30; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Institucion::create(
            [

                'nombre' => $faker->realText(200),
                'localidad' => $faker->city,
                'provincia' => $faker->state,
                'pais' => $faker->country,
                
            ]);
        };
    }
}
