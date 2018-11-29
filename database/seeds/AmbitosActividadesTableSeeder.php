<?php

use Illuminate\Database\Seeder;
use App\AmbitoActividad;
use Faker\Factory as Faker;

class AmbitosActividadesTableSeeder extends Seeder
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
        $ambitos = [
            ['nombre' => 'Actividades intelectuales de Esparcimiento', 
            'descripcion' => 'Considera las actividades competitivas y no competitivas en
            las que se busca poner en evidencia el grado/nivel de conocimiento que poseen los participantes sobre
            una temática u área del conocimiento en particular. Ejemplo: Ferias de ciencia, olimpíadas del
            conocimiento, certámenes disciplinares, cursos y/o talleres de idioma, etc'
            ],
            ['nombre' => 'Actividades deportivas y recreativas', 
            'descripcion' => 'Brinda encuadre a la participación de los estudiantes en actividades
                              competitivas y no competitivas vinculadas al deporte o la recreación. Ejemplo: competencias deportivas,
                              campamentos educativos y/o temáticos, etc.'
                               ], 
            
            ['nombre' => 'Actividades Artísticas y Culturales', 
            'descripcion' => 'Engloba todas aquellas actividades mediante las cuales lo jóvenes se
            vinculan con la cultura y los distintos lenguajes artísticos. Ejemplo: participación en Coros y Orquestas, talleres
            artísticos, etc.'
            ],
            ['nombre' => 'Cursos, talleres y seminarios', 
            'descripcion' => 'Contempla actividades temporales que se relacionan con un área del
            conocimiento o temática en particular. Ejemplo: Cursos de formación Profesional, talleres específicos, etc'
            ],
            ['nombre' => 'Distinciones', 
            'descripcion' => 'Refiere a las distinciones relacionadas con sus cualidades académicas y/o humanas como las
            becas de excelencia académica'
            ],
            ['nombre' => 'Otras actividades', 
            'descripcion' => 'refiere a actividades que no se encuadran en las categorías anteriores.'
            ],
           
        ];
        
    
        foreach(  $ambitos as $ambito ){

          //se crea un usuario
         AmbitoActividad::create($ambito);
        }
        /*//Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 2; $i++)
        {
            //llamamos al Metodo Create del Modelo
            AmbitoActividad::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);
        }*/
    }
}
