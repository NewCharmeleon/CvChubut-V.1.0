<?php

use Illuminate\Database\Seeder;
use App\TipoParticipacion;
use Faker\Factory as Faker;

class TiposParticipacionesTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoParticipacion::truncate();
        $tipos = [
            ['nombre' => 'Expositor', 'descripcion' => 'Requiere que la presencia del participante sea fisica en el lugar'], 
            ['nombre' => 'Asistente', 'descripcion' => 'Puede requerirse que la presencia del participante sea fisica o de manera virtual'],
            ['nombre' => 'Ayudante', 'descripcion' => 'Requiere que la presencia del participante sea de manera virtual'],
            ];
        
    
        foreach(  $tipos as $tipo ){

          //se crea un usuario
         TipoParticipacion::create($tipo);
        }

        /*//Creamos instancia de Faker
        $faker = Faker::create('es_Es');
        //Creamos un bucle para cubrir N Actividades
        for ($i = 0; $i < 25; $i++)
        {
            //llamamos al Metodo Create del Modelo
            TipoParticipacion::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);
        }*/
    }
}
