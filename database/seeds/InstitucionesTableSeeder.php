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
       
        //Creamos bucle para cubrir N Experiencias Laborales
        for ($i=0;$i <10; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Institucion::create(
            [

                'nombre' => $faker->realText($maxNBChars = 30),
                'localidad' => $faker->realText($maxNBChars = 50),
                'provincia' => $faker->realText($maxNBChars = 50),
                'pais' => $faker->realText($maxNBChars = 50),
                
            ]);
        };
    }
}
