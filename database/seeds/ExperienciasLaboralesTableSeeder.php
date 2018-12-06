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
        $puestos = 
            ['Cajero','Tesorero','Ejecutivo de cuenta','Albañil','Jefe de Personal','Director','Empleada domestica',
            'Empleado Publica' 
            ];
        $descripciones = 
        ['Gestión de Cobranzas al publico','Limpieza de Hogares','Construcción de viviendas','Gestión de Personal','Gestión de Escuelas','Gestión de Clientes','Reposición de Mercaderia',
        'Tareas Administrativas' 
        ];    
        //Averiguamos cuantas Personas tenemos
        $cuantos=Persona::all()->count();
        //Creamos bucle para cubrir N Experiencias Laborales
        for ($i=0;$i <10000; $i++)
        {
            //llamamos al Metodo Create del Modelo
            ExperienciaLaboral::create(
            [

                'puesto' => $faker->randomElement( $puestos ),
                'descripcion_de_tareas' => $faker->randomElement( $descripciones ),
                'fecha_ini' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'fecha_fin' => $faker->date($format = 'Y-m-d', $min = 'fecha_ini'),
                'empleador' => $faker->company(),
                'localidad' => $faker->city(),
                'provincia' => $faker->state(),
                'referencia' => $faker->name(),
                'rentado' => $faker->boolean(),
                'persona_id' => $faker->numberBetween($min=0, $cuantos),
            ]);
        };
    }
}
