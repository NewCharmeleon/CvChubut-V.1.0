<?php

use Illuminate\Database\Seeder;
//usamos modelos App/ActividadEspecifica y App/ActividadTipo
use App/ActividadTipo;
use Faker/Factory as Faker;

class ActividadesTableSeeder extends Seeder
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

        //Averiguamos cuantas Actividades Tipo tenemos
        $cuantos=ActividadesTipo::all()->count;


        //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder

        for ($i=0; $i<9; $i++)
        {
            //llamamos al Metodo Create del Modelo para crear una nueva fillable
            Actividad::create(
              [
                'tipo_act_id'=>$faker->numberBetween(1, $cuantos),
                'nombre'=>$faker->word(),
                'descripcion'=>$faker->text($maxNbChars = 255)
              ]
            );
          }
      }
}
