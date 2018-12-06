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
            ['nombre' => 'Charla', 
            'descripcion' => 'Disertación ante un público, sin solemnidad ni excesivas preocupaciones formales.'
            ], 
            ['nombre' => 'Exposición', 
            'descripcion' => 'Las exposiciones es una convocatoria, generalmente pública, en el que se exhiben colecciones de objetos de diversa temática ,se presentan preparadas al enfrentarse a ellas así dirás con toda la seguridad el tema a exponer.'
            ],
            ['nombre' => 'Curso', 
            'descripcion' => 'Se trata de una palabra que hace referencia al periodo de tiempo establecido de forma anual para el dictado de clases en una institución.'
            ],
            ['nombre' => 'Congreso', 
            'descripcion' => 'Reunión, normalmente periódica, en la que, durante uno o varios días, personas de distintos lugares que comparten la misma profesión o actividad presentan conferencias o exposiciones sobre temas relacionados con su trabajo o actividad para intercambiarse informaciones y discutir sobre ellas.'
            ],
            ['nombre' => 'Encuentro', 
            'descripcion' => 'Encuentro puede referirse a: Una reunión entre dos o más personas. Puede estar organizado por una asociación para fomentar una actividad concreta.'
            ],  
            ['nombre' => 'Capacitación', 
            'descripcion' => 'La capacitación se define como el conjunto de actividades didácticas, orientadas a ampliar los conocimientos, habilidades y aptitudes del personal.'
            ], 
            ['nombre' => 'Seminario', 
            'descripcion' => 'Conjunto de actividades que realizan en común profesores y alumnos, y que tiene la finalidad de encaminarlos a la práctica y la investigación de alguna disciplina.'
            ], 
            ['nombre' => 'Taller', 
            'descripcion' => 'en enseñanza, es una metodología de trabajo en la que se integran la teoría y la práctica.'
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
