<?php

namespace App\Http\Controllers;

//Modelo que necesitamos
use App\TipoParticipacion;

//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;


class TipoParticipacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
             $tipos_participaciones = TipoParticipacion::OrderBy('nombre')
                ->paginate(10);
        
            return view('tipo_participacion.index', compact("tipos_participaciones"));
        }
           abort(403);

        
    }

    //Metodo para crear un Tipo de Participacion
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
        
           return view('tipo_participacion.formulario.create');
       }
       abort(403);  
    }
    

    //Metodo para mostrar un Tipo de Participacion determinada
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //guardamos el Tipo de Participacion solicitado en una variable
            $tipo_participacion = TipoParticipacion::findOrFail($id);
            //devolvemos la Vista con las variables y sus datos 
            return view('tipo_participacion.formulario.show', compact('tipo_participacion'));
        }
            //Si otro Usuario quiere ver el Tipo de Participacion
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar un Tipo de Participacion determinada
    public function edit($id)
    {
        $tipo_participacion = TipoParticipacion::findOrFail($id);
        
        return view('tipo_participacion.formulario.edit', compact('tipo_participacion'));
        
        
    }

    //Metodo para actualizar un Tipo de Participacion determinada
    public function update($id, Request $request)
    {
       

        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:tipos_participaciones,nombre,' .$id,
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
        

        //Actualizamos la Modalidad
        $tipo_participacion = TipoParticipacion::findOrFail($id);
        $tipo_participacion->update($request->all());

        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('tipos.participaciones.index');
 
    }

    //Metodo para Guardar los datos de la Modalidad determinada
    public function store(Request $request)
    {
        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:tipos_participaciones,nombre,',
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
        

        //Se crea la Modalidad
        TipoParticipacion::create($request->all());
        

        //Finalizada la creacion con el Request
        //volvemos al Index
        
        return redirect()->route('tipos.participaciones.index');
 
 
     }
     //Metodo para eliminar una Modalidad
     public function destroy($id){

        $tipo_participacion = TipoParticipacion::findOrFail($id);
        $tipo_participacion->delete();

        return redirect()->route('tipos.participaciones.index');
     }
}
