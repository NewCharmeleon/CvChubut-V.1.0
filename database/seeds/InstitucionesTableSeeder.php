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
        //$faker = Faker::create('es_ES');
         	  	  
             	 
        $instituciones = [
            ['nombre' => 'Universidad de Buenos Aires',
            'localidad' => 'Buenos Aires ',
            'provincia' => 'Ciudad Autónoma de Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad de la Defensa Nacional',
            'localidad' => 'Buenos Aires',
            'provincia' => 'Ciudad Autónoma de Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional Almirante Guillermo Brow',
            'localidad' => 'Burzaco',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional Arturo Jauretche',
            'localidad' => 'Florencio Varela,Castelli, Lobos, Brandsen',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Avellaneda',
            'localidad' => 'Avellaneda, Piñeyro',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Catamarca',
            'localidad' => 'Catamarca',
            'provincia' => 'Catamarca',
            'pais' => 'Argentina',
            ],
            ['nombre' => ' Universidad Nacional de Chilecito',
            'localidad' => 'Chilecito',
            'provincia' => 'La Rioja ',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Córdoba',
            'localidad' => 'Córdoba',
            'provincia' => 'Córdoba',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Cuyo',
            'localidad' => 'Mendoza',
            'provincia' => 'Mendoza ',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Entre Ríos',
            'localidad' => 'Concepción del Uruguay, Concordia, Gualeguaychú, Oro Verde, Paraná, Villaguay',
            'provincia' => 'Entre Ríos ',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Formosa',
            'localidad' => 'Formosa',
            'provincia' => 'Formosa ',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Gral. San Martín',
            'localidad' => 'San Martín',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Gral. Sarmiento',
            'localidad' => 'Los Polvorines, Moreno, San Fernando',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Hurlingham',
            'localidad' => 'Villa Tesei',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de José C. Paz',
            'localidad' => 'José C. Paz',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Jujuy',
            'localidad' => 'San Salvador de Jujuy, San Pedro',
            'provincia' => 'Jujuy ',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de La Matanza',
            'localidad' => 'San Justo, Ciudad de Buenos Aires',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de La Pampa',
            'localidad' => 'Santa Rosa, General Pico',
            'provincia' => 'La Pampa',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de la Patagonia Austral',
            'localidad' => 'Río Gallegos, Caleta Olivia, Puerto San Julián, Río Turbio',
            'provincia' => 'Santa Cruz',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de la Patagonia San Juan Bosco',
            'localidad' => 'Comodoro Rivadavia, Esquel, Puerto Madryn, Trelew',
            'provincia' => 'Chubut',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de La Plata',
            'localidad' => 'La Plata',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de La Rioja',
            'localidad' => 'La Rioja, Aimogasta, Chamical, Chepes, Villa Unión',
            'provincia' => 'La Rioja',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de las Artes',
            'localidad' => 'Buenos Aires',
            'provincia' => 'Ciudad Autónoma de Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Lanús',
            'localidad' => 'Lanús',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Lomas de Zamora',
            'localidad' => 'Lomas de Zamora',
            'provincia' => ' Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de los Comechingones',
            'localidad' => 'Villa de Merlo',
            'provincia' => 'San Luis',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Luján',
            'localidad' => 'Luján, San Miguel, Chivilcoy, Campana',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Mar del Plata',
            'localidad' => 'Mar del Plata',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Misiones',
            'localidad' => 'Posadas, Eldorado, Oberá',
            'provincia' => 'Misiones',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Moreno',
            'localidad' => 'Moreno',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Quilmes',
            'localidad' => 'Quilmes',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Rafaela',
            'localidad' => 'Rafaela',
            'provincia' => 'Santa Fe',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Río Cuarto',
            'localidad' => 'Río Cuarto',
            'provincia' => 'Córdoba',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Río Negro',
            'localidad' => 'Viedma, Allen, Bariloche, Choele Choel, Cinco Saltos, Cipolletti, El Bolsón, General Roca, Río Colorado, San Antonio Oeste, Villa Regina ',
            'provincia' => 'Río Negro',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Rosario',
            'localidad' => 'Rosario',
            'provincia' => 'Santa Fe',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Salta',
            'localidad' => 'Salta, Metán, Orán, Rosario de la Frontera, Tartagal',
            'provincia' => 'Salta',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de San Juan',
            'localidad' => 'San Juan',
            'provincia' => 'San Juan',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de San Luis',
            'localidad' => 'San Luis, Merlo, Villa Mercedes',
            'provincia' => 'San Luis',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de San Antonio de Areco',
            'localidad' => 'San Antonio de Areco, Baradero',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Santiago del Estero',
            'localidad' => 'Santiago del Estero',
            'provincia' => 'Santiago del Estero',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Tierra del Fuego, Antártida e Islas del Atlántico Sur',
            'localidad' => 'Ushuaia, Río Grande',
            'provincia' => 'Tierra del Fuego',
            'pais' => 'Argentina',
            ],
            ['nombre' => ' Universidad Nacional de Tres de Febrero',
            'localidad' => 'Saenz Peña, Caseros, El Palomar, Buenos Aires, Villa Lynch',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Tucumán',
            'localidad' => 'San Miguel de Tucumán, Yerba Buena',
            'provincia' => 'Tucumán',
            'pais' => 'Argentina',
            ],
            ['nombre' => ' Universidad Nacional de Villa María',
            'localidad' => 'Villa María, Córdoba, Villa del Rosario, San Francisco, Villa Dolores, Deán Funes',
            'provincia' => 'Córdoba',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional de Villa Mercedes',
            'localidad' => 'Villa Mercedes',
            'provincia' => 'San Luis',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Alto Uruguay',
            'localidad' => 'San Vicente',
            'provincia' => 'Misiones',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Centro de la Provincia de Buenos Aires',
            'localidad' => 'Tandil, Azul, Olavarría, Quequén',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Chaco Austral',
            'localidad' => 'Roque Sáenz Peña',
            'provincia' => 'Chaco',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Comahue',
            'localidad' => 'Neuquén, Allen, Bariloche, Choele Choel, Cinco Saltos, Cipolletti, Chos Malal, General Roca, San Antonio Oeste, San Martín de los Andes, Viedma, Villa Regina, Zapala',
            'provincia' => 'Neuquén',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Litoral',
            'localidad' => 'Santa Fe, Rafaela, Esperanza, Reconquista, Gálvez',
            'provincia' => 'Santa Fe',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Nordeste',
            'localidad' => 'Corrientes, Resistencia, Presidencia Roque Sáenz Peña, Curuzú Cuatiá, Paso de los Libres',
            'provincia' => 'Corrientes',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Noroeste de la Provincia de Buenos Aires',
            'localidad' => 'Junín, Pergamino',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Oeste',
            'localidad' => 'San Antonio de Padua, Merlo',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional del Sur',
            'localidad' => 'Bahía Blanca',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Nacional Raúl Scalabrini Ortiz',
            'localidad' => 'San Isidro',
            'provincia' => 'Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad Tecnológica Nacional',
            'localidad' => 'Buenos Aires, Avellaneda, Bahía Blanca, Campana, Concepción del Uruguay, Concordia, Córdoba, General Pacheco, Haedo, La Plata, La Rioja, Mendoza, Neuquén, Paraná, Plaza Huincul, Puerto Madryn, Rafaela, Rawson, Otras Ciudades',
            'provincia' => 'Ciudad Autónoma de Buenos Aires',
            'pais' => 'Argentina',
            ],
            ['nombre' => 'Universidad del Chubut',
            'localidad' => 'Rawson, Esquel, Gaiman, Puerto Madryn',
            'provincia' => 'Chubut',
            'pais' => 'Argentina',
            ],
           
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
    
        foreach(  $instituciones as $institucion ){

          //se crea un usuario
         Institucion::create($institucion);
        }
        /*//Creamos bucle para cubrir N Instituciones
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
        };*/
    }
}
