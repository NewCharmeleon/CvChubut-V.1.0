<?php



namespace App\Http\Controllers;

//Modelo que necesitamos
use App\ExperienciaLaboral;
use Carbon\Carbon;


//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      
        if(  auth()->user()->hasRole(['Estudiante'])  ){
            //usuario logueado
           $persona = \Auth::user()->persona;
            //persona del usuario
             //$persona_id = $persona->id;
             $experiencias_laborales = ExperienciaLaboral::ExperienciasDelUsuario($persona);
        }
       // $experiencias_laborales = ExperienciaLaboral::where('persona_id', $persona_id)->orderBy('fecha_ini')->paginate(10);
             return view('experiencia_laboral.index', compact('experiencias_laborales', 'persona'));
     
        //abort(403);
    }  

    //Metodo para crear una Experiencia Laboral
    public function create()
    {
        
        //verificamos si tiene el Rol Estudiante 
        //sino arrojamos Error 403
        if( !auth()->user()->hasRole(['Estudiante'])){
            abort(403);
        }

        $hoy = Carbon::now();
        $persona = \Auth::user()->persona;
        
        return view('experiencia_laboral.formulario.create', compact('hoy', 'persona'));
        

    }

    

    //Metodo para mostrar una Experiencia Laboral determinada
    public function show($id)
    {

        if (\Auth::user()->hasRole('Estudiante')) {

            $persona = \Auth::user()->persona;
            $experiencia_laboral = ExperienciaLaboral::where('id', $id)->where('persona_id', $persona->id)->get()->first();

            if (count($experiencia_laboral) == 0) {
                abort(403);
            }

        } else {

        }

        return view('experiencia_laboral.formulario.show', compact('persona', 'experiencia_laboral'));

    }

    //Metodo para editar una Experiencia Laboral determinada
    public function edit($id)
    {
        if (\Auth::user()->hasRole('Estudiante')) {

            $persona = \Auth::user()->persona;
            $experiencia_laboral = ExperienciaLaboral::where('id', $id)->where('persona_id', $persona->id)->get()->first();

            if (count($experiencia_laboral) == 0) {
                abort(403);
            }

        } else {

        }

        $hoy = Carbon::now();

        return view('experiencia_laboral.formulario.edit', compact('persona', 'experiencia_laboral', 'hoy'));

    }

    //Metodo para actualizar una Experiencia Laboral determinada
    public function update($id, Request $request)
    {
       
       $experiencia_laboral = ExperienciaLaboral::findOrFail($id);

       //si no es una Actividad del usuario logueado o no es estudiante
       //mostramos 403
       if (\Auth::user()->hasRole('Estudiante'))
       {

            if ($experiencia_laboral->persona_id != \Auth::user()->persona->id)
            {
                abort(403);
            }
       }
       
        $hoy = Carbon::now();

        $validaciones = \Validator::make($request->all(),[

            'puesto' => 'required|max:250|min:3',
            'descripcion_de_tareas' => 'required|max:250|min:3',
            'fecha_ini' => 'required|date_format:d-m-Y|before_or_equal:' . $hoy->format('d-m-Y'),
            'fecha_fin' => 'nullable|date_format:d-m-Y|after:fecha_ini|before_or_equal:' . $hoy->format('d-m-Y'),
            'empleador' => 'required|max:250|min:3',
            'localidad' => 'required|max:250|min:3',
            'provincia' => 'required|max:250|min:3|solo_letras',
            'referencia' => 'required|max:250|min:3',
            'rentado' => 'nullable|boolean',
            'mostrar_cv' => 'boolean',
            
        
        ]);

        if ($validaciones->fails()){
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }

        //Actualizamos la Experiencia Laboral
        $experiencia_laboral->update($request->all());

        return redirect()->route('experiencias.laborales.index');
 
    }

    //Metodo para Guardar los datos de la Experiencia Laboral determinada
    public function store(Request $request)
    {
       //si no es una Estudiante el usuario logueado o no es estudiante
       //mostramos 403
       if (!\Auth::user()->hasRole('Estudiante'))
       {
           abort(403);
            
       }
       
        $hoy = Carbon::now();

        $validaciones = \Validator::make($request->all(),[

            'puesto' => 'required|max:250|min:3',
            'descripcion_de_tareas' => 'required|max:250|min:3',
            'fecha_ini' => 'required|date_format:d-m-Y|before_or_equal:' . $hoy->format('d-m-Y'),
            'fecha_fin' => 'nullable|date_format:d-m-Y|after:fecha_ini|before_or_equal:' . $hoy->format('d-m-Y'),
            'empleador' => 'required|max:250|min:3',
            'localidad' => 'required|max:250|min:3',
            'provincia' => 'required|max:250|min:3|solo_letras',
            'referencia' => 'required|max:250|min:3',
            'rentado' => 'nullable|boolean',
            'mostrar_cv' => 'boolean',
            
        
        ]);

        if ($validaciones->fails()){
            return redirect()
                ->back()
                ->withErrors($validaciones->errors())
                ->withInput(Input::all());

        }

        //Traspasamos los datos del Request a una variable temporal
        $data_request = $request->all();
        //le agregamos al id de la persona el id del Usuario logueado
        $data_request['persona_id'] = \Auth::user()->persona->id; 
        
        //Creamos la Experiencia Laboral
        ExperienciaLaboral::create($data_request);

        return redirect()->route('experiencias.laborales.index');
 
     }
    
     //Metodo para eliminar una Experiencia Laboral
     public function destroy($id)
    {
        $user = \Auth::user();

        if ($user->hasRole('Estudiante')){
            $experiencia_laboral = $user->persona->experiencias_laborales()->where('id', $id)->get()->first;
            //verificamos que el Usuario Estudiante no pueda borrar una Actividad que no sea suya
            if (count($experiencia_laboral) == 0){
                abort(403);
            }
        }
        
        $experiencia_laboral->delete();

        return redirect()->route('experiencias.laborales.index');
 
     }

     //Metodo para mostrar el Cv
     public function mostrar_cv($id)
     {
        $ajax = request()->ajax();
        $user = \Auth::user();

        if ($user->hasRole('Estudiante')){

            $experiencia_laboral = $user->persona->experiencias_laborales()->where('id', $id)->get()->first();

            //verificamos que el usuario logueado como Estudiante no pueda 
            //dar de Baja una Experiencia Laboral que no sea suya
            if (count($experiencia_laboral) == 0){
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

        if ($experiencia_laboral->mostrar_cv == true){
            //si es por ajax se envia el boton indicando que 
            //es igual
            return response()->json([
                'igual' => true,
            ]);
        }
        //Se actualiza el boton
        $experiencia_laboral->mostrar_cv = true;
        $experiencia_laboral->save();

        if ($ajax){
            //enviamos el boton indicando que se actualizo
            return response()->json([
                'update' => true
            ]);
        }
        //sino se redirige al index
        return redirect()->route('experiencias.laborales.index');

     }
     //Metodo para ocultar el Cv
    public function ocultar_cv($id)
    {
        $ajax = request()->ajax();
        $user = \Auth::user();

        if ($user->hasRole('Estudiante')){

            $experiencia_laboral = $user->persona->experiencias_laborales()->where('id', $id)->get()->first();

            //verificamos que el usuario logueado como Estudiante no pueda 
            //dar de Baja una Experiencia Laboral que no sea suya
            if (count($experiencia_laboral) == 0){
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

        if ($experiencia_laboral->mostrar_cv == false){
            //si es por ajax se envia el boton indicando que 
            //es igual
            return response()->json([
                'igual' => true,
            ]);
        }
        //Se actualiza el boton
        $experiencia_laboral->mostrar_cv = false;
        $experiencia_laboral->save();

        if ($ajax){
            //enviamos el boton indicando que se actualizo
            return response()->json([
                'update' => true
            ]);
        }
        //sino se redirige al index
        return redirect()->route('experiencias.laborales.index');
    }
}
