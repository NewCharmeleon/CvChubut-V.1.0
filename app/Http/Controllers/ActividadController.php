<?php

namespace App\Http\Controllers;

//use App\User;
use App\Actividad;
use App\Modalidad;
use App\Institucion;
use App\ActividadTipo;
use App\AmbitoActividad;
use App\TipoParticipacion;
use App\ExperienciaLaboral;

use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      
        if(  auth()->user()->hasRole(['Estudiante'])  ){
            //usuario logueado
            $user = \Auth::user();
            //persona del usuario
             $persona = $user->persona;

             return view('actividad.index', compact('persona'));
        }
        abort(403);
      }

    //Metodo para crear un usuario
    public function create()
    {
        $instituciones = Institucion::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $actividades_tipos = ActividadTipo::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $ambitos_actividades = AmbitoActividad::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $tipos_participaciones = TipoParticipacion::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $modalidades = Modalidad::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $hoy = Carbon::now();

        if( auth()->user()->hasRole(['Estudiante'])){
            return view('actividad.formulario.create', compact('instituciones', 'actividades_tipos', 'ambitos_actividades', 'tipos_participaciones', 'modalidades', 'hoy'));
        }
        abort(403);

    }

    

    //Metodo para mostrar una Persona determinada
    public function show($id){

        //guardamos la Actividad solicitado en una variable
        $actividad = Actividad::findOrFail($id);

        //Si otro Usuario quiere ver las Actividades de este Usuario
        //arrojamos momentaneamente 403
        if($actividad->persona_id != auth()->user()->persona->id){
            abort(403);
        }
        
     
        //devolvemos la Vista con las variables y sus datos 
        return view('actividad.formulario.show', compact('actividad'));
    
    }


    //Metodo para editar una Actividad determinada
    public function edit($id)
    {
        $instituciones = Institucion::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $actividades_tipo = ActividadTipo::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $ambitos_actividades = AmbitoActividad::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $tipos_participaciones = TipoParticipacion::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $modalidades = Modalidad::OrderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        $hoy = Carbon::now();

        $user = auth()->user();
        //Si el usuario tiene Rol Estudiante
        if( $user->hasRole(['Estudiante'])){
            //buscamos la actividad por el Id solicitado
            $actividad = Actividad::findOrFail( $id );
            //si es una Actividad del usuario
            if($user->persona->id == $actividad->persona_id){
                return view('actividad.formulario.edit', compact('instituciones', 'actividades_tipos', 'ambitos_actividades', 'tipos_participaciones', 'modalidades', 'hoy', 'actividad'));
            }

        }
        //sino mostramos 403
        abort(403);
        
    }

    //Metodo para actualizar una Actividad determinada
    public function update($id, Request $request)
    {
       $user = auth()->user();
       $actividad = Actividad::findOrFail($id);

       //si no es una Actividad del usuario logueado o no es estudiante
       //mostramos 403
       if ($user->persona->id != $actividad->persona_id || $user->hasRole(['Estudiante']) == false){
           abort(403);
       }
       
        $hoy = Carbon::now();

        $validaciones = \Validator::make($request->all(),[

            'nombre' => 'required|max:250|min:3',
            'lugar' => 'required|max:250|min:3',
            'fecha_inicio' => 'required|date_format:d-m-Y|before_or_equal:' . $hoy->format('d-m-Y'),
            'fecha_fin' => 'nullable|date_format:d-m-Y|after:fecha_inicio|before_or_equal:' . $hoy->format('d-m-Y'),
            'actividad_tipo_id' => 'required|exists:actividades_tipo,id',
            'ambito_actividad_id' => 'required|exists:ambitos_actividades,id',
            'tipo_participacion_id' => 'required|exists:tipos_participaciones,id',
            'modalidad_id' => 'required|exists:modalidades,id',
            'mostrar_cv' => 'boolean',
            'institucion_id'  => 'nullable|exists:instituciones,id|required_without:institucion_check',
            'nombre_institucion'    => 'required_with:institucion_check|min:3|max:250|nullable',
            'localidad_institucion' => 'min:3|max:250', 
            'provincia_institucion' => 'min:3|max:250',
            'pais_institucion'      => 'min:3|max:250',
        
        
        
        ]);

        if ($validaciones->fails()){
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }

        if( $request->exists('instituciones_check')){
            //Si el campo de Nuevo registro de Institucion esta activo
            //creamos una nueva
            $institucion = Institucion::create([
                
                'nombre' => $request->nombre_institucion,
                'localidad' => $request->localidad_institucion,
                'provincia' => $request->provincia_institucion,
                'pais' => $request->pais_institucion,

            ]);

            //rellenamos el request con el id de la Nueva Institucion
            $request->merge(['institucion_id' => $institucion->id]);
        }



        //Actualizamos la Actividad
        $actividad->update($request->except(
            'nombre_institucion',
            'localidad_institucion',
            'provincia_institucion',
            'pais_institucion')
        );

        return redirect()->route('actividades.index');
 
    }

    //Metodo para Guardar los datos de la persona determinada
    public function store(Request $request)
    {
        $hoy = Carbon::now;
        
        
        $validaciones = \Validator::make($request->all(),[

            'nombre' => 'required|max:250|min:3',
            'lugar' => 'required|max:250|min:3',
            'fecha_inicio' => 'required|date_format:d-m-Y|before_or_equal:' . $hoy->format('d-m-Y'),
            'fecha_fin' => 'nullable|date_format:d-m-Y|after:fecha_inicio|before_or_equal:' . $hoy->format('d-m-Y'),
            'actividad_tipo_id' => 'required|exists:actividades_tipo,id',
            'ambito_actividad_id' => 'required|exists:ambitos_actividades,id',
            'tipo_participacion_id' => 'required|exists:tipos_participaciones,id',
            'modalidad_id' => 'required|exists:modalidades,id',
            'mostrar_cv' => 'boolean',
            'institucion_id'  => 'nullable|exists:instituciones,id|required_without:institucion_check',
            'nombre_institucion'    => 'required_with:institucion_check|min:3|max:250|nullable',
            'localidad_institucion' => 'min:3|max:250', 
            'provincia_institucion' => 'min:3|max:250',
            'pais_institucion'      => 'min:3|max:250',
        
        
        
        ]);

        if ($validaciones->fails()){
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }

        $request->merge(['persona_id' => auth()->user()->persona->id]);
        
        if( $request->exists('instituciones_check')){
            //Si el campo de Nuevo registro de Institucion esta activo
            //creamos una nueva
            $institucion = Institucion::create([
                
                'nombre' => $request->nombre_institucion,
                'localidad' => $request->localidad_institucion,
                'provincia' => $request->provincia_institucion,
                'pais' => $request->pais_institucion,

            ]);

            //rellenamos el request con el id de la Nueva Institucion
            $request->merge(['institucion_id' => $institucion->id]);
        }

        //Se crea una Actividad
        $actividad = Actividad::create($request->except(
            'nombre_institucion',
            'localidad_institucion',
            'provincia_institucion',
            'pais_institucion')
        );

        return redirect()->route('actividades.index');
 
     }
    
     //Metodo para eliminar una Actividad
     public function destroy($id)
    {
        $user = \Auth::user();

        if ($user->hasRole('Estudiante')){
            $actividad = $user->persona->actividades()->where('id', $id)->get()->first;
            //verificamos que el Usuario Estudiante no pueda borrar una Actividad que no sea suya
            if (count($actividad) == 0){
                abort(403);
            }
        }
        
        $actividad->delete();

        return redirect()->route('actividades.index');
 
     }

     //Metodo para mostrar el Cv
     public function mostrar_cv($id)
     {
        $ajax = request()-ajax();
        $user = \Auth::user();

        if ($user->hasRole('Estudiante')){

            $actividad = $user->persona->actividades()->where('id', $id)->get()->first();

            //verificamos que el usuario logueado como Estudiante no pueda 
            //dar de Baja una Experiencia Laboral que no sea suya
            if (count($actividad) == 0){
                //si es mediante ajax indica que no se actualizara enviando
                //mensaje de error
                if ($ajax) {
                    return response()->json([
                        'update' => false,
                        'error' => "No se puede actualizar",
                    ]);
                }
                //si no se encuentra el recurso
                abort(404);

            }
        }

        if ($actividad->mostrar_cv == true){
            //si es por ajax se envia el boton indicando que 
            //es igual
            return response()->json([
                'igual' => true,
            ]);
        }
        //Se actualiza el boton
        $actividad->mostrar_cv = true;
        $actividad->save();

        if ($ajax){
            //enviamos el boton indicando que se actualizo
            return response()->json([
                'update' => true
            ]);
        }
        //sino se redirige al index
        return redirect()->route('actividades.index');

     }
     //Metodo para ocultar el Cv
    public function ocultar_cv($id)
    {
        $ajax = request()-ajax();
        $user = \Auth::user();

        if ($user->hasRole('Estudiante')){

            $actividad = $user->persona->actividades()->where('id', $id)->get()->first();

            //verificamos que el usuario logueado como Estudiante no pueda 
            //dar de Baja una Experiencia Laboral que no sea suya
            if (count($actividad) == 0){
                //si es mediante ajax indica que no se actualizara enviando
                //mensaje de error
                if ($ajax) {
                    return response()->json([
                        'update' => false,
                        'error' => "No se puede actualizar",
                    ]);
                }
                //si no se encuentra el recurso
                abort(404);

            }
        }

        if ($actividad->mostrar_cv == false){
            //si es por ajax se envia el boton indicando que 
            //es igual
            return response()->json([
                'igual' => true,
            ]);
        }
        //Se actualiza el boton
        $actividad->mostrar_cv = false;
        $actividad->save();

        if ($ajax){
            //enviamos el boton indicando que se actualizo
            return response()->json([
                'update' => true
            ]);
        }
        //sino se redirige al index
        return redirect()->route('actividades.index');
    }
}    
