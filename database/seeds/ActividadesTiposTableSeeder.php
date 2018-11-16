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
        $tipos = [
            ['nombre' => 'Promocionables', 
            'descripcion' => 'Actividades Relativas a la trayectoria formativa universitaria del Estudiante que exigen que sean formalmente acreditadas'
            ], 
            ['nombre' => 'No Promocionables', 
            'descripcion' => 'Actividades Relativas a la trayectoria formativa universitaria del Estudiante que no tienen carácter obligatorio y no deben ser formalmente acreditadas.
                              Actividades tales como las sociales,
                              culturales, deportivas, de vida en la naturaleza, y aquellas que propenden al desarrollo artístico e intelectual de los
                              jóvenes, asi como premios al merito individual o colectivo como ser la
                              distinción en concursos y certámenes o el reconocimiento por formar parte de proyectos sociales, solidarios y/o
                              ambientales.'
            ],
            
            ];
        
           
            
        foreach(  $tipos as $tipo ){

          //se crea un usuario
         ActividadTipo::create($tipo);
        }
        /*//Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 10; $i++)
        {
            //llamamos al Metodo Create del Modelo
            ActividadTipo::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);
        }*/
    }
}
