<?php

namespace App\Http\Controllers;
//Modelo a usar
use App\Modalidad;

//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;

class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
             $modalidades = Modalidad::OrderBy('nombre')
                ->paginate(10);
        
            return view('modalidad.index', compact("modalidades"));
        }
           abort(403);

        
    }

    //Metodo para crear una Modalidad
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
        
           return view('modalidad.formulario.create');
       }
       abort(403);  
    }
    

    //Metodo para mostrar una Modalidad determinada
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //guardamos el Ambito de Actividad solicitado en una variable
            $modalidad = Modalidad::findOrFail($id);
            //devolvemos la Vista con las variables y sus datos 
            return view('modalidad.formulario.show', compact('modalidad'));
        }
            //Si otro Usuario quiere ver la Modalidad
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar una Modalidad determinada
    public function edit($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        
        return view('modalidad.formulario.edit', compact('modalidad'));
        
        
    }

    //Metodo para actualizar un Ambito de Actividad determinada
    public function update($id, Request $request)
    {
       

        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:modalidades,nombre,' . $id,
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
        $modalidad = Modalidad::findOrFail($id);
        $modalidad->update($request->all());

        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('modalidades.index');
 
    }

    //Metodo para Guardar los datos de la Modalidad determinada
    public function store(Request $request)
    {
        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|solo_letras|max:250|min:3|unique:modalidades,nombre,' . $id,
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
        Modalidad::create($request->all());
        

        //Finalizada la creacion con el Request
        //volvemos al Index
        
        return redirect()->route('modalidades.index');
 
 
     }
     //Metodo para eliminar una Modalidad
     public function destroy($id){

        $modalidad = Modalidad::findOrFail($id);
        $modalidad->delete();

        return redirect()->route('modalidades.index');
     }
}
