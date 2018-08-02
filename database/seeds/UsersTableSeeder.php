<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\User;
use App\Role;
use App\Persona;
use App\Carrera;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //Vaciamos las Tablas para evitar errores
    
    Role::truncate();
    User::truncate();
    Persona::truncate();
    DB::table('role_user')->truncate();
        
    //Creamos instancia de Faker designando el lenguaje a utilizar
    $faker = Faker::create('es_ES');
    
    /*
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      User::create(
      [
        'username'=>$faker->unique($reset = true)->userName(),
        'email'=>$faker->unique($reset = true)->safeEmail(),
        'password'=>Hash::make(123456)
      ]);
    }*/

    //Datos basicos para rellenar los roles basicos
    $roles = [
      [
        'name' => "Administrator",
        'display_name' => "Administrador",
        'description' => "Persona con permisos para controlar el Sistema"
      ], 
      [
        'name' => "Secretaria",
        'display_name' => "Secretaria",
        'description' => "Persona con permisos para gestionar los Estudiantes y/o Personas"
      ],
      [
        'name' => "Estudiante",
        'display_name' => "Estudiante UDC",
        'description' => "persona con permisos para ver y editar su perfil junto a sus Actividades"
      ],
    ];

    //Creacion de los Roles basicos para pruebas
    foreach( $roles as $rol ) {
      Role::create($rol);
    }

    //Rol Administrador
    //llamamos al Metodo Create del Modelo para crear un nuevo fillable
    $user = User::create([
      'username' => 'administrador_udc',
      'email' => 'administrador@udc.edu.ar',
      'password' => '12456'
    ]);
    
    //Metodo a revisar para crear Personas Administradores  
    //llamamos al Metodo Create del Modelo mediante nuevo Fillable
    $persona = Persona::create([
      'nombre_apellido' => $faker->firstName." ".$faker->lastName,
      'dni' => '1357911',
      'nacionalidad' => 'Argentina',
      'fecha_nac' => $faker->date('d-m-Y'),
      'telefono' => "",
      'carrera_id' => null,
      'user_id' => $user->id
    ]);
    
    //Se llama al Metodo para hashear el password
    $user->hashPassword();
    //Se asigna el Rol Administrador al Usuario
    $user->attachRole(Role::where('name', 'LIKE', 'Administrator')->get()->first()->id);


    //Rol Secretaria
    //llamamos al Metodo Create del Modelo para crear una Secretaria
    $user = User::create([
      'username' => 'secretaria_udc',
      'email' => 'secretaria@udc.edu.ar',
      'password' => '123456',
    ]);
    
    //Metodo a revisar para crear Personas Secretaria  
    //llamamos al Metodo Create del Modelo mediante nuevo Fillable
    $persona = Persona::create([
      'nombre_apellido' => $faker->firstName." ".$faker->lastName,
      'dni' => '1357911',
      'nacionalidad' => 'Argentina',
      'fecha_nac' => $faker->date('d-m-Y'),
      'telefono' => "",
      'carrera_id' => null,
      'user_id' => $user->id
    ]);
    

    //Se llama al Metodo para hashear el password
    $user->hashPassword();
    //Se asigna el Rol Secretaria al Usuario
    $user->attachRole(Role::where('name', 'LIKE', 'Secretaria')->get()->first()->id);

    //Rol Alumno por defecto
    //llamamos al Metodo Create del Modelo para crear un Alumno por defecto
    $user = User::create([
      'username' => 'alumno',
      'email' => 'alumno@udc.edu.ar',
      'password' => '123456',
    ]);

    //Metodo a revisar para crear Personas Alumnos  
    //llamamos al Metodo Create del Modelo mediante nuevo Fillable
    $persona = Persona::create([
      'nombre_apellido' => $faker->firstName." ".$faker->lastName,
      'dni' => '1357911',
      'nacionalidad' => 'Argentina',
      'fecha_nac' => $faker->date('d-m-Y'),
      'telefono' => "",
      'carrera_id' => null,
      'user_id' => $user->id
    ]);
    

    //Se llama al Metodo para hashear el password
    $user->hashPassword();
    //Se asigna el Rol Alumno al Usuario
    $user->attachRole(Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id);


    //carga de Alumnos de prueba mediante Arreglo

    $alumnos = [
      [ 
        //alumno
        "usuario" => [//usuario
          "email"     => "baaballay@udc.edu.ar",
          "password"  => "123456",
          "username"  => "alumno"
        ], //persona
        "persona" => [
          "nombre_apellido" => "ABALLAY Belen Ayelen",
          "dni" => "38804297"
        ]   
      ],

      [ 
        //alumno
        "usuario" => [//usuario
          "email"    => "drabarzua@udc.edu.ar",
          "password" => "123456",
          "username" => "alumno"
        ],
        //persona
        "persona" => [
          "nombre_apellido" => "ABARZUA Delia Rocio",
          "dni" => "39440366"
        ]
      ],
      [ 
          //alumno
        "usuario" => [//usuario
          "email" => "bsabraham@udc.edu.ar",
          "password" => "123456",
          "username" => "alumno"
        ], //persona
        "persona" => [
          "nombre_apellido" => "ABRAHAM Bruno Stefano",
          "dni" => "41525735"
        ]
      ]

    ];

    foreach(  $alumnos as $alumno ){

      //temporal de datos de usuario para crear uno nuevo
      $data_user = $alumno['usuario'];
      
      //temporal de datos de persona 
      $data_persona = $alumno[ 'persona' ] ; 
      
      //se crea un usuario
      $user = User::create( $data_user  );

      //se actualiza temporal de persona con el usuario asociado 
      $data_persona['user_id'] = $user->id;

      //creamos persona
      $persona =  Persona::create($data_persona );

      //se hace hash de la contraseña con el dni de persona
      $user->hashPassword(); 
      //se genera el username correspondiente
      $user->updateUsername(); 
      //se asigna el rol estudiante
      $user->attachRole(Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id);
      


    }

  }
}
