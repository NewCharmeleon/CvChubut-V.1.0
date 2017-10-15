<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      User::create(
      [
        'name'=>$faker->unique()->userName(),
        'email'=>$faker->unique()->freeEmail(),
        'password'=>$faker->unique()->password()
      ]);
    }
  }
}
