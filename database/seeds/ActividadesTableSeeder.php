<?php

use Illuminate\Database\Seeder;
//Modelos a utilizar en el Seeder
use App\Actividad;
use App\Institucion;
use App\User;
use App\ActividadTipo;
use App\AmbitoActividad;
use App\TipoParticipacion;
use App\Modalidad;

use Faker\Factory as Faker;

class ActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actividad::truncate();

        //Creamos instancia de Faker
        $faker = Faker::create('es_ES');
        //Averiguamos cuantas Personas tenemos
        /*Metodo alternativo para los selects
        $cuantos=Persona::all()->count();
        $cuantos1=Institucion::all()->count();
        $cuantos2=ActividadTipo::all()->count();
        $cuantos3=AmbitoActividad::all()->count();
        $cuantos4=TipoParticipacion::all()->count();
        $cuantos5=Modalidad::all()->count();*/
        $nombres = 
            ['Ferias de Ciencia y Tecnología','Regata del Rio Negro','Exploradores de Don Bosco','Hackaton de Android','Turismo Científico','Maraton Dia del Trabajo','Posicionamiento Ceo',
            'Hacking Ético', 'Campeonato de Futbol del Sur', 'Copa Libertadores de America' 
            ];
        $frecuencias = 
        ['Unica vez','Diaria','Semanal','Mensual','Anual' 
        ];
        $duraciones = 
        ['Hs.','Dia','Semana','Mes','Año'
        ];        
            

        //Segundo metodo mejorado
        $instituciones = Institucion::all()->pluck('id')->toArray();
        $persona = User::whereHas('roles', function($query){
                                                return $query->where( 'display_name','LIKE', '%Estudiante%');
                                                })->get()->first()->persona->id;
        $actividadesTipo = ActividadTipo::all()->pluck('id')->toArray();
        $ambitoActividades = AmbitoActividad::all()->pluck('id') ->toArray();
        $tiposParticipaciones = TipoParticipacion::all()->pluck('id')->toArray();
        $modalidades = Modalidad::all()->pluck('id')->toArray();                                       
        
        //Creamos bucle para cubrir N Experiencias Laborales
        for ($i=0;$i <9; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Actividad::create(
            [
                'nombre' =>$faker->randomElement( $nombres ),
                //'nombre' =>$faker->name(),
                'lugar' => $faker->streetAddress(),
                'fecha_inicio' => $faker->date('d-m-Y', $max = 'now'),
                'fecha_fin' => $faker->date('d-m-Y'),
                'mostrar_cv' => $faker->randomElement( array ( true, false )),
                'institucion_id' => $faker->randomElement( $instituciones ),
                'persona_id' => $persona,
                'actividad_tipo_id' => $faker->randomElement( $actividadesTipo ),
                'ambito_actividad_id' => $faker->randomElement( $ambitoActividades ),
                'tipo_participacion_id' => $faker->randomElement( $tiposParticipaciones ),
                'modalidad_id' => $faker->randomElement( $modalidades ), 
                'frecuencia' =>$faker->randomElement( $frecuencias ),
                'duracion' =>$faker->numberBetween(0,100),
                'duracion_tipo' =>$faker->randomElement( $duraciones ),
                'observacion' =>null,
                                   
                //'duracion' => 
                //'referente' => $faker->realText($maxNBChars = 50),
                
                
                
                
            ]);
        };
    }
}
