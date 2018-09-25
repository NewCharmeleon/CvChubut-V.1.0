<?php

namespace App\Http\Controllers;
//modelo que necesitamos
use App\Institucion;

//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class InstitucionController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
             $instituciones = Institucion::OrderBy('nombre')
                ->paginate(10);
        
            return view('institucion.index', compact("instituciones"));
        }
           abort(403);

        
    }

    //Metodo para crear una Institucion
    public function create()
    {
        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
        
           return view('institucion.formulario.create');
       }
       abort(403);  
    }
    

    //Metodo para mostrar una Modalidad determinada
    public function show($id){

        if( auth()->user()->hasRole(['Administrador','Secretaria'])){
            
            //guardamos la Institucion solicitada en una variable
            $institucion = Institucion::findOrFail($id);
            //devolvemos la Vista con las variables y sus datos 
            return view('institucion.formulario.show', compact('institucion'));
        }
            //Si otro Usuario quiere ver la Modalidad
            //arrojamos momentaneamente 403
        
            abort(403);
        }
        
    
    //Metodo para editar una Institucion determinada
    public function edit($id)
    {
        $institucion = Institucion::findOrFail($id);
        
        return view('institucion.formulario.edit', compact('institucion'));
        
        
    }

    //Metodo para actualizar un Ambito de Actividad determinada
    public function update($id, Request $request)
    {
       

        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|max:255|min:3',
            'localidad' => 'nullable|max:255|min:5',
            'provincia' => 'nullable|max:255|min:5',
            'pais' => 'nullable|max:255|min:5',
            
        
        
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
        

        //Actualizamos la Institucion
        $institucion = Institucion::findOrFail($id);
        $institucion->update($request->all());

        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('instituciones.index');
 
    }

    //Metodo para Guardar los datos de la Modalidad determinada
    public function store(Request $request)
    {
        //Definimos las reglas de validacion
        $rules = [

            'nombre' => 'required|max:255|min:3',
            'localidad' => 'nullable|max:255|min:5',
            'provincia' => 'nullable|max:255|min:5',
            'pais' => 'nullable|max:255|min:5',
            
        
        
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
        

        //Se crea la Modalidad
        Institucion::create($request->all());
        //Finalizada la actualizacion con el Request
        //volvemos al Index
        
        return redirect()->route('instituciones.index');
        

 
     }
     //Metodo para eliminar una Modalidad
     public function destroy($id){

        $institucion = Institucion::findOrFail($id);
        $institucion->delete();

        return redirect()->route('instituciones.index');
     }
}
