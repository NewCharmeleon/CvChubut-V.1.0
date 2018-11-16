<?php

use Illuminate\Database\Seeder;
use App\Modalidad;
use Faker\Factory as Faker;

class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::truncate();
        $faker = Faker::create('es_ES');
        

        //Creamos instancia de Faker
        $faker = Faker::create('es_Es');
        $modalidades = [
            ['nombre' => 'Presencial', 'descripcion' => 'Requiere que la presencia del participante sea fisica en el lugar'], 
            ['nombre' => 'SemiPresencial', 'descripcion' => 'Puede requerirse que la presencia del participante sea fisica o de manera virtual'],
            ['nombre' => 'A distancia', 'descripcion' => 'Requiere que la presencia del participante sea de manera virtual'],
            ];
        
    
        foreach(  $modalidades as $modalidad ){

          //se crea un usuario
         Modalidad::create($modalidad);
        }
        //Creamos el bucle para cubrir N Modalidades
        /*for ($i=0; $i<3; $i++)
        {
            //llamamos al Metodo Create del Modelo
            Modalidad::create(
            [
                'nombre' => $faker->realText(20),
                'descripcion' => $faker->realText(50),
            ]);

        }*/
    }
}
