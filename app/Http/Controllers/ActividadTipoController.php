<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\ActividadTipo;

//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class ActividadTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
             $actividades_tipos = ActividadTipo::OrderBy('nombre')
                ->paginate(10);
        
            return view('actividadTipo.index', compact("actividades_tipos"));
        }
        dd("hola");
        abort(403);

        
    }

    //Metodo para crear un Tipo de Actividad
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
        
           return view('actividadTipo.formulario.create');
       }
       abort(403);  
    }
    

    //Metodo para mostrar un Tipo de Actividad determinado
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //guardamos el Ambito de Actividad solicitado en una variable
            $actividad_tipo = ActividadTipo::findOrFail($id);
            //devolvemos la Vista con las variables y sus datos 
            return view('actividadTipo.formulario.show', compact('actividad_tipo'));
        }
            //Si otro Usuario quiere ver el Ambito de Actividad
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar un Ambito de Actividad determinado
    public function edit($id)
    {
        $actividad_tipo = ActividadTipo::findOrFail($id);
        
        return view('actividadTipo.formulario.edit', compact('actividad_tipo'));
        
        
    }

    //Metodo para actualizar un Ambito de Actividad determinada
    public function update($id, Request $request)
    {
       

        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:actividades_tipos,nombre,' . $id,
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
        $actividad_tipo = ActividadTipo::findOrFail($id);
        $actividad_tipo->update($request->all());

        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('actividades.tipos.index');
 
    }

    //Metodo para Guardar los datos del Ambito de Actividad determinada
    public function store(Request $request)
    {
        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:ambios_actividades,nombre,' . $id,
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
        ActividadTipo::create($request->all());
        

        //Finalizada la creacion con el Request
        //volvemos al Index
        
        return redirect()->route('actividades.tipos.index');
 
 
     }
     //Metodo para eliminar un Tipo de Actividad
     public function destroy($id){

        $actividad_tipo = ActividadTipo::findOrFail($id);
        $actividad_tipo->delete();

        return redirect()->route('actividades.tipos.index');
     }
}
