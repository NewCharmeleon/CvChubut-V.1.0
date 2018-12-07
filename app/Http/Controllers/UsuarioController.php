<?php

namespace App\Http\Controllers;

//Modelos a utilizar
use App\Carrera;
use App\Persona;
use App\Role;
use App\User;

//Clase Response para crear la respuesta especial
//con la cabecera de localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Metodo para mostrar todas las personas

        //tomamos el id del Rol Estudiante
        $rol = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;

        //filtramos los usuarios que tengan Roles y no el rol "Estudiante"
        $usuarios = User::whereHas('roles', function ($query) use ($rol) {
            
            return $query->where('id', '!=', $rol);

        })->with('persona')->orderBy('username')->paginate(10);
       
        return view('usuario.index', compact('usuarios'));
        
            
    }
    //Metodo para crear un usuario
    public function create()
    {
        $nacionalidades = Persona::nacionalidades();
        $carreras = Carrera::get()->pluck('nombre', 'id')->toArray();
        $roles = Role::where('name', '!=', 'Estudiante')->orderBy('display_name')->get();

        return view('usuario.formulario.create', compact('nacionalidades', 'carreras', 'roles' ));

    }

    //Metodo para acceder al Perfil
    public function perfil()
    {
        //tomamos el usuario logueado
        $user = \Auth::user();
        //tomamos la persona del usuario logueado
        $persona = $user->persona;

        //Devolvemos la vista perfil con los datos del Usuario y la Persona
        return view('usuario.formulario.perfil', compact('user','persona'));
    }

    //Metodo para editar el perfil si es el suyo
    public function perfil_edit()
    {
        //dd("hola");
        //tomamos el usuario logueado
        $user = \Auth::user();
        //dd($user);
        //tomamos la persona del usuario logueado
        $persona = $user->persona;
        //dd($persona);
        //llamamos al metodo Nacionalidades del Modelo Persona
        $nacionalidades = Persona::nacionalidades();
        //dd($nacionalidades);
        //obtenemos las Carreras y las convertimos a Array
        $carreras = Carrera::get()->pluck('nombre','id')->toArray();
        //dd($carreras);
        //Devolvemos la vista perfil con las variables obtenidas
        return view('usuario.formulario.perfil_edit', compact('user', 'persona', 'nacionalidades', 'carreras'));
        //return view ('home', compact('user', 'persona', 'nacionalidades', 'carreras'));
    }

    //Metodo para mostrar una Persona determinada
    public function show($id){

        //guardamos el Usuario solicitado en una variable
        $user = User::findOrFail($id);
        //guardamos los datos de la Persona con Usuario encontrado
        $persona = $user->persona;
        //devolvemos la Vista con las variables y sus datos 
        return view('usuario.formulario.show', compact('user', 'persona'));
    
    }

    //Metodo para editar una persona determinada
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $persona = $user->persona;
        $nacionalidades = Persona::nacionalidades();
        $carreras = Carrera::get()->pluck('nombre', 'id')->toArray();
        $roles = Role::where('name', '!=', 'Estudiante')->orderBy('display_name')->get();

        return view('usuario.formulario.edit', compact('user', 'persona', 'nacionalidades', 'carreras', 'roles' ));

    }
    //Metodo para actualizar persona determinada
    public function update($id, Request $request)
    {
        //validacion del servidor
        /*
        'nombre_apellido',
        'dni',
        'nacionalidad',
        'fecha_nac',
        'telefono',
        'carrera_id',
         */

        $rules = [
            'nombre_apellido' => 'required|min:4|max:50|solo_letras',
            'dni' => 'required|min:8|max:10|dni_unique:' . $id,
            'fecha_nac' => 'required|date_format:d-m-Y|mayor_de_edad',
            'nacionalidad' => 'nullable|nacionalidad_exist',
            'telefono' => 'nullable|min:13|max:15|telefono_valid',
            
        ];

        if (!$request->exists('perfil')) {
            $rules['email'] = 'email|required|unique:users,email|email_udc_valid' .$id;
        }

        $validaciones = \Validator::make($request->all(), $rules);

        if ($validaciones->fails()) {
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());
        }

        $user = User::findOrFail($id);

        if (!$request->exists('perfil')) {

          $user->update($request->only('email'));
          $user->roles()->sync([$request->rol_id]); //asignacion de rol a usuario


        }
        $persona = $user->persona;
        $persona->update($request->except('email'));

        // si existe la bandera perfil redirecciona al perfil del usuario logueado
        if ($request->exists('perfil')) {
            return redirect()->route('perfil');
        }

        return redirect()->route('usuarios.index');
    }

    //Metodo para Guardar los datos de la persona determinada
    public function store(Request $request)
    {
        $id = null;
        $rules = [
            'nombre_apellido' => 'required|min:4|max:50|solo_letras',
            'dni' => 'required|min:8|max:10|dni_unique:'.$id,
            'fecha_nac' => 'required|date_format:d-m-Y|mayor_de_edad',
            'nacionalidad' => 'nullable|nacionalidad_exist',
            'telefono' => 'nullable|min:13|max:15|telefono_valid',
            'email' => 'email|required|unique:users,email|email_udc_valid',
            'rol_id'  => 'required|exists:roles,id'
        ];

        $validaciones = \Validator::make($request->all(), $rules);

        if ($validaciones->fails()) {
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());
        }


        //se crea un usuario
        $user = User::create(['username' => 'alumno', 'password' => '123456', 'email' => $request->email]);

        //se actualiza temporal de persona con el usuario asociado
        $data_persona = $request->except('email','rol_id');
        $data_persona['user_id'] = $user->id;

        //creamos persona
        $persona = Persona::create($data_persona);

        $user->hashPassword(); //se hace hash de la contraseña con el dni de persona
        $user->updateUsername(); //se genera el username correspodiente
        //se asigna el rol estudiante
        $user->attachRole( $request->rol_id ); //asignacion de rol a usuario
        return redirect()->route('usuarios.index');

    }

    
     //Metodo para eliminar un usuario
     public function destroy($id)
    {
        $user = User::findOrFail( $id );

        $user->persona->delete();
        $user->roles()->sync([]);
        $user->delete();

        return redirect()->route('usuarios.index');
 
     }
}
