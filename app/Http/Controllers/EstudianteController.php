<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Estudiante;
use App\Role;
use App\User;
use App\Persona;
use App\Carrera;

//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Faker\Factory as Faker;

class EstudianteController extends Controller
{
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //Buscamos el Rol Estudiante
            $rol = Role::where('name', 'LIKE', 'Estudiante')->get()->first();
            //Buscamos los Usuarios con Rol Estudiante
            $estudiantes = User::whereHas('roles', function ($query) use ($rol){
                return $query->where('id', $rol->id);
            })->with('persona.carrera')->orderBy('username')->paginate(10);
              
            //Mostramos todos los Estudiantes         
            return view('estudiante.index', compact('estudiantes'));
        }
           abort(403);

        
    }

    //Metodo para crear un Estudiante en caso de ser necesario
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            $nacionalidades = Persona::nacionalidades();
            $carreras = Carrera::get()->pluck('nombre', 'id')->toArray();


            return view('estudiante.formulario.create', compact('nacionalidades', 'carreras'));
       }
       abort(403);  
    }
    

    //Metodo para mostrar un Estudiante determinado
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //buscamos el Usuario solicitado en una variable
            $user = User::findOrFail($id);
            //tomamos la persona del Usuario solicitado
            $persona = $user->persona;

            //buscamos las Nacionalidades de la Persona
            $nacionalidades = Persona::nacionalidades();
            //buscamos las Carreras
            $carreras = Carrera::get()->pluck('nombre', 'id')->toArray();

            //devolvemos la Vista con las variables y sus datos 
            return view('estudiante.formulario.show', compact('user', 'persona', 'nacionalidades', 'carreras'));
        }
            //Si otro Usuario quiere ver la Modalidad
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar un Estudiante determinado
    public function edit($id)
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            $user = User::findOrFail($id);
            $persona = $user->persona;

            $nacionalidades = Persona::nacionalidades();
            $carreras = Carrera::get()->pluck('nombre', 'id')->toArray();




            return view('estudiante.formulario.edit', compact('user', 'persona','nacionalidades', 'carreras'));
       }
       abort(403); 
    }

    //Metodo para actualizar un Estudiante determinado
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        //Definimos las reglas de validacion
        $rules = [

            'email' => 'email|required|email_udc_valid',
            'nombre_apellido' => 'required|max:255|min:4|solo_letras',
            'dni' => 'required|max:10|min:8',
            'fecha_nac' => 'required|date_format:d-m-Y|mayor_de_edad',
            'nacionalidad' => 'nullable|nacionalidad_exist',
            'carrera_id' => 'required|exists:carreras,id',
            'materias_aprobadas' => 'min:1|max:carreras,cantidad_materias|numeric',
            'telefono' => 'nullable|min:13|max:15|telefono_valid',
            
        
        
        ];
        
              

        //realizamos la validacion del request frente a las reglas
        $validator = \Validator::make($request->all(), $rules);
        
         //preguntamos si hay errores
         if ($validator->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput(Input::all());

        }
        

        //Actualizamos solo el Email del Usuario con los datos del request
        $user->update( $request->only('email') );
        //Asignamos la persona del Usuario
        $persona = $user->persona;
        //Actualizamos a la Persona con los datos restantes del Request
        $persona->update( $request->except('email') );

        //Actualizamos el Username del Usuario
        $user->updateUsername();
        
        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('estudiantes.index');
 
    }

    //Metodo para Guardar los datos de la Modalidad determinada
    public function store(Request $request)
    {
        //Definimos las reglas de validacion
        $rules = [

            'email' => 'email|required|unique:users,email|email_udc_valid',
            'nombre_apellido' => 'required|max:255|min:4|solo_letras',
            'dni' => 'required|max:10|min:8|dni_unique:' . '',
            'fecha_nac' => 'required|date_format:d-m-Y|mayor_de_edad',
            'nacionalidad' => 'nullable|nacionalidad_exist',
            'carrera_id' => 'required|exists:carreras,id',
            'materias_aprobadas' => 'min:1|max:carreras,cantidad_materias|numeric',
            'telefono' => 'nullable|min:13|max:15|telefono_valid',
            
        
        
        ];
        
        //realizamos la validacion del request frente a las reglas
        $validator = \Validator::make($request->all(), $rules);
        
         //preguntamos si hay errores
         if ($validator->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput(Input::all());

        }
        

        //Se llama a el Rol estudiante
        $rol_estudiante = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;

        //Creamos un Usuario con Username y Password por defecto, y tambien le asignamos el Email del request
        $user = User::create([ 'username' => 'alumno', 'password' =>'123456' , 'email' => $request->email  ]);
        
        //Actualizamos el temporal de persona con los datos del request excepto el Email
        $data_persona = $request->except('email');
        //Asignamos al temporal de persona el id del Usuario a quien referencia
        $data_persona['user_id'] = $user->id;
        //Creamos la Persona
        $persona = Persona::create($data_persona);
        //Hasheamos el Password
        $user->hashPassword();
        //Actualizamo el Username
        $user->updateUsername();
        //Asignamos el Rol correspondiente al Estudiante
        $user->attachRole($rol_estudiante);

        //Finalizado volvemos al Index
        
        return redirect()->route('estudiantes.index');
        
    }
    //Metodo especial para mostrar la vista para agregar Estudiantes
    public function agregar_estudiantes_show(){
        
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
           return view('estudiante.agregar');
        }
        abort(403);    
    }

    //Metodo especial para guardar los Estudiantes mediante Json ya creado
    public function agregar_estudiantes_store(Request $request)
    {
        
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            //Agregado para rellenar las Carreras que no estaban
            $cuantos=Carrera::all()->count();
            //Creamos instancia de Faker designando el lenguaje a utilizar
            $faker = Faker::create('es_ES'); 

           ini_set('max_execution_time', '150');
           
           $validaciones = \Validator::make($request->all(), ['estudiante' => 'required']);
        
           if( $validaciones->fails()   ){
              return response()->json(  $validaciones->errors()->toArray()   );
           }

           //Leemos el fichero en una variable y convertimos
           //su contenido en una estructura de datos
           $str_datos = file_get_contents($request->file('estudiante') );
           //var_dump($str_datos);
           $datos = json_decode($str_datos, true);

           $rol_estudiante = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;
           
           foreach ($datos as $index => $dato){

                if ($index >=1 )
                {
                    $nombre_apellido = $dato[0] . " " . $dato[1];
                    $dni = $dato[2];
                    $email = $dato[3];
                    //$carrera = $dato[4];
                    

                    if (User::where('email', 'LIKE', $email)->get()->count() == 0 )
                    {
                            $estudiante = [

                            //alumno
                            "usuario" => [
                                "email" => $email,
                                "password" => "123456",
                                "username" => "alumno"
                            ], 
                            //persona
                            "persona" => [
                                "nombre_apellido" => $nombre_apellido, 
                                "dni" => $dni,
                                'carrera_id' => $faker->numberBetween($min=1, $cuantos),
                            ]
                            
                        ];
                        //temporal de los datos de un usuario
                        $data_user = $estudiante['usuario'];
                        //temporal de los datos de una persona
                        $data_persona = $estudiante['persona'];

                        //Creamos un Usuario con los datos del temporal
                        $user = User::create($data_user);

                        //Actualizamos el temporal de los datos con el id del Usuario que referencia
                        $data_persona['user_id'] = $user->id;

                        //Creamos una Persona con los datos del temporal
                        $persona = Persona::create($data_persona);

                        //Hasheamos el Password del Usuario
                        $user->hashPassword();
                        //Actualizamos el Username del Usuario
                        $user->updateUsername();
                        //Asignamos el Rol del Estudiante
                        $user->attachRole($rol_estudiante);

                    }
                }

            }
           
           //devolvemos la respuesta del metodo
           return response()->json(['procesado' => true]);
        }
         abort(403);

    }
    //Metodo para especial para guardar los Estudiantes mediante Excel ya creado
    public function importExcel()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            //Agregado para rellenar las Carreras que no estaban
            $cuantos=Carrera::all()->count();
            //Creamos instancia de Faker designando el lenguaje a utilizar
            $faker = Faker::create('es_ES'); 

            /** El método load permite cargar el archivo definido como primer parámetro */
            Excel::load($archivo.'.xlsx', function ($reader) {
                /**
                 * $reader->get() nos permite obtener todas las filas de nuestro archivo
                 */
                $rol_estudiante = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;

                foreach ($reader->get() as $key => $row) {
                    $persona = [
                        'nombre_apellido' => $row['apellido' . " " .'nombre'],
                        'dni' => $row['dni'],
                        'email' => $row['email'],
                        'fecha_registro' => $row['fecha_registro'],
                        'status' => $row['status'],
                    ];
                    //alumno
                    
                    $usuario = [
                        'email' => $row['email'],
                        'password' => "123456",
                        'username' => "alumno",
                       
                    ];

                    /** Una vez obtenido los datos de la fila procedemos a registrarlos */
                    if (!empty($archivo)) {
                         //temporal de los datos de un usuario
                         $data_user = $estudiante['usuario'];
                         //temporal de los datos de una persona
                         $data_persona = $estudiante['persona'];
 
                         //Creamos un Usuario con los datos del temporal
                         $user = User::create($data_user);
 
                         //Actualizamos el temporal de los datos con el id del Usuario que referencia
                         $data_persona['user_id'] = $user->id;
 
                         //Creamos una Persona con los datos del temporal
                         $persona = Persona::create($data_persona);
 
                         //Hasheamos el Password del Usuario
                         $user->hashPassword();
                         //Actualizamos el Username del Usuario
                         $user->updateUsername();
                         //Asignamos el Rol del Estudiante
                         $user->attachRole($rol_estudiante);
 
                    }
                }

            
                echo 'Los Alumnos han sido importadas exitosamente';
            });
        } 
        abort(403);   
    }
    //Metodo para especial para guardar los Estudiantes mediante Excel ya creado
    public function importCsv()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            //Agregado para rellenar las Carreras que no estaban
            $cuantos=Carrera::all()->count();
            //Creamos instancia de Faker designando el lenguaje a utilizar
            $faker = Faker::create('es_ES'); 

            
            /** El método load permite cargar el archivo definido como primer parámetro */
            //Metodo para archivo Csv
            /** Carga del documento*/
            Excel::load($archivo.'.csv', function ($reader) {
                        /**
                 * $reader->get() nos permite obtener todas las filas de nuestro archivo
                 */
                $rol_estudiante = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;
                foreach ($reader->get() as $key => $row) {
                    $persona = [
                        'nombre_apellido' => $row['apellido' . " " .'nombre'],
                        'dni' => $row['dni'],
                        'email' => $row['email'],
                        'fecha_registro' => $row['fecha_registro'],
                        'status' => $row['status'],
                    ];
                    //alumno
                    
                    $usuario = [
                        'email' => $row['email'],
                        'password' => "123456",
                        'username' => "alumno",
                       
                    ];

                    /** Una vez obtenido los datos de la fila procedemos a registrarlos */
                    if (!empty($archivo)) {
                         //temporal de los datos de un usuario
                         $data_user = $estudiante['usuario'];
                         //temporal de los datos de una persona
                         $data_persona = $estudiante['persona'];
 
                         //Creamos un Usuario con los datos del temporal
                         $user = User::create($data_user);
 
                         //Actualizamos el temporal de los datos con el id del Usuario que referencia
                         $data_persona['user_id'] = $user->id;
 
                         //Creamos una Persona con los datos del temporal
                         $persona = Persona::create($data_persona);
 
                         //Hasheamos el Password del Usuario
                         $user->hashPassword();
                         //Actualizamos el Username del Usuario
                         $user->updateUsername();
                         //Asignamos el Rol del Estudiante
                         $user->attachRole($rol_estudiante);
 
                    }
                }

            
                echo 'Los Alumnos han sido importadas exitosamente';
            });
        } 
        abort(403);   
    }




    //Metodos Anexos de la libreria
    public function exportExcel()
    {
        /** Fuente de Datos Eloquent */
        $data = User::all();

        /** Creamos nuestro archivo Excel */
        Excel::create('usuarios', function ($excel) use ($data) {

            /** Creamos una hoja */
            $excel->sheet('Hoja Uno', function ($sheet) use ($data) {
                /**
                 * Insertamos los datos en la hoja con el método with/fromArray
                 * Parametros: (
                 * Datos,
                 * Valores del encabezado de la columna,
                 * Celda de Inicio,
                 * Comparación estricta de los valores del encabezado
                 * Impresión de los encabezados
                 * )*/
                $sheet->with($data, null, 'A1', false, false);
            });

            /** Descargamos nuestro archivo pasandole la extensión deseada (xls, xlsx) */
        })->download('xlsx');///** Descarga del documento en csv ->download('csv');
    }


    public function bladeToExcel()
    {
        /** Creamos un archivo llamado fromBlade.xlsx */
        Excel::create('fromBlade', function ($excel) {
            
            /** La hoja se llamará Usuarios */
            $excel->sheet('Usuarios', function ($sheet) {
                /** El método loadView nos carga la vista blade a utilizar */
                $sheet->loadView('usuarios');
            });
            /** Agregará una segunda hoja y se llamará Productos */
            $excel->sheet('Productos', function ($sheet) {
                $sheet->loadView('productos');
            });
        })->download('xlsx');
    }
    //Metodo especial para mostrar la vista para agregar Estudiantes
    public function update_materias_show(){
        
        if( auth()->user()->hasRole(['Estudiante'])){
            
           return view('update.materias_edit');
        }
        abort(403);    
    }
    
    
    //Metodo especial para guardar los Estudiantes creado
    public function update_materias($id, Request $request)
    {
        
        if( auth()->user()->hasRole(['Estudiante']))
        {
            $user = User::findOrFail($id);
                      
        

        //Definimos las reglas de validacion
        $validaciones = \Validator::make($request->all(),
        [
            'materias_aprobadas' => 'min:1|max:carreras,cantidad_materias|numeric',
            
        ]);

        
         //preguntamos si hay errores
         if ($validaciones->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }
        //Asignamos la persona del Usuario
        $persona = $user->persona;
        //Actualizamos a la Persona con los datos restantes del Request
        $persona->materias_aprobadas = $request->get('materias_aprobadas');

        $persona->save();
               
        

        //Finalizada la Creacion con el Request
        //volvemos al Index
        
        return redirect()->route('carrera.perfil');
 
           
           
        }
         abort(403);

    }
}