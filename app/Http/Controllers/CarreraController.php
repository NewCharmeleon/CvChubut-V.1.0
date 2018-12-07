<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Carrera;
//Clase Response para crear la respuesta especial con la cabecera
//de localizacion en el Metodo Store() 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
             $carreras = Carrera::OrderBy('nombre')
                ->paginate(10);
        
            return view('carrera.index', compact("carreras"));
        }
        
        
        abort(403);

        
    }
    //Metodo para acceder al Perfil
    public function carrera_perfil()
    {
        if( auth()->user()->hasRole(['Estudiante'])){
        //tomamos el usuario logueado
        $user = \Auth::user();
        //tomamos la persona del usuario logueado
        $persona = $user->persona;
        //dd($persona);
        $id = $persona->carrera_id;
        //guardamos la Carrera solicitado en una variable
        $carrera = Carrera::findOrFail($id);
            //dd($id);
             //$id = $persona->carrera->id;

            //buscamos las Carreras
            //$carrera = Carrera::get()->pluck('nombre', 'id')->toArray();

            //devolvemos la Vista con las variables y sus datos 
            return view('carrera.formulario.perfil', compact('user', 'persona', 'carrera'));
       
            
           // return view('carrera.materias_aprobadas.agregar');
         }

        //Devolvemos la vista perfil con los datos del Usuario y la Persona
        //return view('usuario.formulario.perfil', compact('user','persona'));
    }

    //Metodo para editar el perfil si es el suyo
    public function carrera_perfil_edit()
    {
        
        if( auth()->user()->hasRole(['Estudiante'])){
            //dd("hola");
            //tomamos el usuario logueado
            $user = \Auth::user();
            //dd($user);
            //tomamos la persona del usuario logueado
            $persona = $user->persona;
            //dd($persona);
            $id = $persona->carrera_id;
            //guardamos la Carrera solicitado en una variable
            $carrera = Carrera::findOrFail($id);
            //dd($persona);
            //llamamos al metodo Nacionalidades del Modelo Persona
            //dd($nacionalidades);
            //obtenemos las Carreras y las convertimos a Array
           // $carreras = Carrera::get()->pluck('materias_aprobadas','nombre','id')->toArray();
            //dd($carreras);
            //Devolvemos la vista perfil con las variables obtenidas
            return view('carrera.formulario.perfil_edit', compact('user', 'persona', 'carrera'));
        //return view ('home', compact('user', 'persona', 'nacionalidades', 'carreras'));
        }
    }

    //Metodo para crear una Carrera
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
        
           return view('carrera.formulario.create');
       }
       abort(403);  
    }
    

    //Metodo para mostrar una Carrera determinado
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //guardamos la Carrera solicitado en una variable
            $carrera = Carrera::findOrFail($id);
            //devolvemos la Vista con las variables y sus datos 
            return view('carrera.formulario.show', compact('carrera'));
        }
            //Si otro Usuario quiere ver la Carrera
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar una Carrera determinada
    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        
        return view('carrera.formulario.edit', compact('carrera'));
        
        
    }

    //Metodo para actualizar una Carrera determinada
    public function update($id, Request $request)
    {
       

        
       // dd($request);
        //variables temporales para tomar los datos del Request y Setearlos
        //antes de la actualizacion
        $nombre_original = $request->nombre;
        //sacamos los espacios del inicio y del fin
        $nombre_para_validacion = trim($nombre_original);
        //reemplazamos los espacios intermedios por guiones bajos
        $nombre_para_validacion = str_replace(' ', '_', $nombre_para_validacion);
        //convertimos las letras a minusculas
        $nombre_para_validacion = strtolower( $nombre_para_validacion);

        //actualizamos el dato del request con la variable ya modificado con los Setters
        $request->merge(['nombre' => $nombre_para_validacion]);
        //dd($request);
        //Definimos las reglas de validacion
        $validaciones = \Validator::make($request->all(),
        [
            'nombre' => 'required|max:250|min:3|unique:carreras,nombre,' .$id,
            'cantidad_materias' => 'required|min:1|numeric',
            
        ]);

       
        //actualizamos el dato del request con la variable original ya validada correctamente
        $request->merge(['nombre' => $nombre_original]);
         //preguntamos si hay errores
         if ($validaciones->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }
        

        //Actualizamos la Carrera
        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());
       
        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('carreras.index');
 
    }

    //Metodo para Guardar los datos del Ambito de Actividad determinada
    public function store(Request $request)
    {
       
        //variables temporales para tomar los datos del Request y Setearlos
        //antes de la actualizacion
        $nombre_original = $request->nombre;
        //sacamos los espacios del inicio y del fin
        $nombre_para_validacion = trim($nombre_original);
        //reemplazamos los espacios intermedios por guiones bajos
        $nombre_para_validacion = str_replace(' ', '_', $nombre_para_validacion);
        //convertimos las letras a minusculas
        $nombre_para_validacion = strtolower( $nombre_para_validacion);

        //actualizamos el dato del request con la variable ya modificado con los Setters
        $request->merge(['nombre' => $nombre_para_validacion]);

        //Definimos las reglas de validacion
        $validaciones = \Validator::make($request->all(),
        [
            'nombre' => 'required|max:250|min:3|unique:carreras,nombre,',
            'cantidad_materias' => 'required|max:255|min:1|numeric',
            
        ]);

        
        //actualizamos el dato del request con la variable original ya validada correctamente
        $request->merge(['nombre' => $nombre_original]);
         //preguntamos si hay errores
         if ($validaciones->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }
        
        
        //Creamos la Carrera
        $carrera = Carrera::create($request->all() );
        

        //Finalizada la Creacion con el Request
        //volvemos al Index
        
        return redirect()->route('carreras.index');
 
 
     }
     

     //Metodo para eliminar un Tipo de Carrera
     public function destroy($id){

        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras.index');
     }
}
