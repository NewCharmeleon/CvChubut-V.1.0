<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
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
      $cuantos=User::all()->count;

      'user_id'=>$faker->unique()->numberBetween(1, $cuantos),
      'nombre'=>$faker->word(),
      'dni'=>$faker->unique()->numberBetween($min = 10000000, $max = 45000000),
      'nacionalidad'=>$faker->word,
      'direccion'=>$faker->word(),
      'fecha_nac'=>$faker->date($format = 'Y-m-d', $max = 'now'),
      'telefono'=>$faker->unique()->numberBetween($min = 2804000000, $max = 2804999999)
          );
        }
    }
    }
}
