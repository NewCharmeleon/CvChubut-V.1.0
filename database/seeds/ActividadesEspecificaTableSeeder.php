<?php

use Illuminate\Database\Seeder;
use App/ActividadEspecifica;

use Faker/Factory as Faker;

class ActividadesEspecificaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos instancia de Faker
        $faker = Faker::create();

        //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder

        for ($i=0; $i<9; $i++)
        {
            //llamamos al Metodo Create del Modelo para crear una nueva fillable
            ActividadEspecifica::create(
              [
                  $cuantos=Actividad::all()->count;

                  'act_id'=>$faker->numberBetween(1, $cuantos),
                  'nombre'=>$faker->word(),
                  'fecha_desde'=>$faker->date($format = 'Y-m-d', $max = 'fecha_hasta'),
                  'fecha_hasta'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                  'instancia'=>$faker->word(),
                  'puesto_mencion'=>$faker->word(),
                  'inst_referente'=>$faker->word(),
                  'inst_oferente'=>$faker->word(),
                  'lugar'=>$faker->word()

              ]
            );
        }
    }
}
