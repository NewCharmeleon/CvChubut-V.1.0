<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Carrera;
//Clase Response para crear la respuesta especial con la cabecera
//de localizacion en el Metodo Store() 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminte\Support\Facades\Input;

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
            'nombre' => 'required|max:250|min:3|unique:carreras, nombre,' . $id,
            'cantidad_materias' => 'required|max:50|min:1|numeric',
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
            'nombre' => 'required|max:250|min:3|unique:carreras, nombre,' . $id,
            'cantidad_materias' => 'required|max:50|min:1|numeric',
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
     //Metodo para eliminar un Tipo de Actividad
     public function destroy($id){

        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras.index');
     }
}
