<?php

use Illuminate\Database\Seeder;
//usamos modelos App/ActividadEspecifica y App/ActividadTipo
use App\Actividad;
use App\ActividadTipo;
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
    //Creamos instancia de Faker
    $faker = Faker::create('es_ES');
    //Averiguamos cuantas Actividades Tipo tenemos
    $cuantos=ActividadTipo::all()->count();
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      Actividad::create(
      [
        'act_tipo_id'=>$faker->numberBetween($min=1, $cuantos),
        'nombre'=>$faker->word(),
        'descripcion'=>$faker->paragraph(1),
      ]);
    }
  }
}
