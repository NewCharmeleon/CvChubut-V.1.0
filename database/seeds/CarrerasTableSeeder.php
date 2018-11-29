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
       // $faker = Faker::create('es_Es');
        $carreras = [
            ['nombre' => 'Licenciatura en Enfermeria', 'cantidad_materias' => '33'], 
            ['nombre' => 'Licenciatura en Administración de Áreas Naturales', 'cantidad_materias' => '52'],
            ['nombre' => 'Licenciatura en Redes y Telecomunicaciones', 'cantidad_materias' => '55'],
            ['nombre' => 'Tecnicatura Universitaria en Energías Renovables', 'cantidad_materias' => '21'],
            ['nombre' => 'Tecnicatura Universitaria en Acompañamiento Terapéutico', 'cantidad_materias' => '28'],
            ['nombre' => 'Tecnicatura Universitaria en Paleontología', 'cantidad_materias' => '22'],
            ['nombre' => 'Tecn. Univ. en Admin. de Emprendimientos Agropecuarios', 'cantidad_materias' => '25'],
            ['nombre' => 'Tecnicatura Universitaria en Gestión de la Información de Salud', 'cantidad_materias' => '25'],
            ['nombre' => 'Tecnicatura Universitaria en Desarrollo de Software', 'cantidad_materias' => '20'],
        ];
        /*//Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 9; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Carrera::create(
            [
                'nombre' => $faker->randomElement($carreras),
                'cantidad_materias' => $faker->numberBetween(2,30)
            ]);
        }*/
    
        foreach(  $carreras as $carrera ){

          //se crea un usuario
         Carrera::create($carrera);
        }
    }
}    
