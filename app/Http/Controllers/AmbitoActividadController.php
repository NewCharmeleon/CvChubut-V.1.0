<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbitoActividad;

class AmbitoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
             $ambitos_actividades = AmbitoActividad::OrderBy('nombre')
                ->paginate(10);
        
            return view('ambito_actividad.index', compact("ambitos_actividades"));
        }
        
        abort(403);

        
    }

    //Metodo para crear un Ambito de Actividad
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
        
           return view('ambito_actividad.formulario.create');
       }
       abort(403);  
    }
    

    //Metodo para mostrar un Ambito de Actividad determinado
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //guardamos el Ambito de Actividad solicitado en una variable
            $ambito_actividad = AmbitoActividad::findOrFail($id);
            //devolvemos la Vista con las variables y sus datos 
            return view('ambito_actividad.formulario.show', compact('ambito_actividad'));
        }
            //Si otro Usuario quiere ver el Ambito de Actividad
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar un Ambito de Actividad determinado
    public function edit($id)
    {
        $ambito_actividad = AmbitoActividad::findOrFail($id);
        
        return view('ambito_actividad.formulario.edit', compact('ambito_actividad'));
        
        
    }

    //Metodo para actualizar un Ambito de Actividad determinada
    public function update($id, Request $request)
    {
       

        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:ambitos_actividades,nombre,' .$id,
            'descripcion' => 'max:250|min:3',
            
        
        
        ];
        
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

        

        //realizamos la validacion del request frente a las reglas
        $validator = \Validator::make($request->all(), $rules);
        //actualizamos el dato del request con la variable original ya validada correctamente
        $request->merge(['nombre' => $nombre_original]);
         //preguntamos si hay errores
         if ($validator->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput(Input::all());

        }
        

        //Actualizamos el Ambito de Actividad
        $ambitoActividad = AmbitoActividad::findOrFail($id);
        $ambitoActividad->update($request->all());

        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('ambitos.actividades.index');
 
    }

    //Metodo para Guardar los datos del Ambito de Actividad determinada
    public function store(Request $request)
    {
        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:ambitos_actividades,nombre,',
            'descripcion' => 'max:250|min:3',
            
        
        
        ];
        
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

        

        //realizamos la validacion del request frente a las reglas
        $validator = \Validator::make($request->all(), $rules);
        //actualizamos el dato del request con la variable original ya validada correctamente
        $request->merge(['nombre' => $nombre_original]);
         //preguntamos si hay errores
         if ($validator->fails()) {
            //volvemos al formulario con los errorres cargados
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput(Input::all());

        }
        

        //Se crea el Ambito de Actividad
        AmbitoActividad::create($request->all());
        

        //Finalizada la creacion con el Request
        //volvemos al Index
        
        return redirect()->route('ambitos.actividades.index');
 
 
     }
    
    
}
