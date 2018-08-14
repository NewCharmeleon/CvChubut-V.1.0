<?php

use Illuminate\Database\Seeder;
use App\Actividad;
use App\Institucion;
use App\Persona;
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
        $cuantos=Persona::all()->count();
        $cuantos1=Institucion::all()->count();
        $cuantos2=ActividadTipo::all()->count();
        $cuantos3=AmbitoActividad::all()->count();
        $cuantos4=TipoParticipacion::all()->count();
        $cuantos5=Modalidad::all()->count();
        //Creamos bucle para cubrir N Experiencias Laborales
        for ($i=0;$i <10; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Actividad::create(
            [
                'institucion_id' => $faker->numberBetween($min=0, $cuantos1),
                'persona_id' => $faker->numberBetween($min=0, $cuantos),
                'nombre' =>$faker->name(),
                'actividad_tipo_id' => $faker->numberBetween($min=0, $cuantos2),
                'ambito_actividad_id' => $faker->numberBetween($min=0, $cuantos3),
                'tipo_participacion_id' => $faker->numberBetween($min=0, $cuantos4),
                'modalidad_id' => $faker->numberBetween($min=0, $cuantos5),
                'fecha_ini' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'fecha_ini'),
                'duracion' => $faker->numberBetween(2,10),
                'referente' => $faker->realText($maxNBChars = 50),
                'lugar' => $faker->realText($maxNBChars = 50),
                
                
                
            ]);
        };
    }
}
