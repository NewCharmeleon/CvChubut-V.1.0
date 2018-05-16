<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\ActividadEspecifica;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ActividadEspecificaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todas las actividades especificas
    //return "Mostrando todas las actividades especificas";
    /*ejemplo para apirestfull
    $actividadesEspecificas=Cache::remember('cacheusers',15/60, function(){
      return ActividadEspecifica::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$actividadesEspecificas->nextPageUrl(),'anterior'=>$actividadesEspecificas->previousPageUrl(),'data'=>$actividadesEspecificas->items()],200);
    */
    /*$actividadEspecifica=Cache::remember('cacheactividadEspecifica', 15/60, function(){
      return ActividadEspecifica::simplePaginate(10);
    });*/ 
      $actividadEspecifica=actividadEspecifica::orderBy('id','DESC')->paginate(5);
      return view('actividadEspecifica.index', compact($actividadEspecifica,'actividadEspecifica'));
    }
    
  
 
       
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    /*//Se Mostrara un formulario para la carga de actividades especificas
    return response()
                ->json([
                    'form' => ActividadEspecifica::form(),
                    'option' => []
                ]);
    //return "Mostrando formulario para crear una actividad especifica";*/
   $actividadEspecifica = new ActividadEspecifica();
    return view('actividadEspecifica.create')->with('actividadEspecifica', $actividadEspecifica);
    //return view('actividadEspecifica.create');
  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {
    // Realizamos la validación de datos recibidos del formulario.
    $rules=array(
      'act_id'=>'required', // Username es único en la tabla users
      'nombre'=>'required|min:5', // Username es único en la tabla users
      'fecha_desde'=>'required',
      'fecha_hasta'=>'required',
      'instancia'=>'required',
      'puesto_mencion'=>'required',
      'inst_referente'=>'required',
      'inst_oferente'=>'required',
      'lugar'=>'required',
      );
     
    // Llamamos a Validator pasándole las reglas de validación.
    $validator=Validator::make($request->all(),$rules);
    /* //no se $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);*/
    // Si falla la validación redireccionamos de nuevo al formulario
    // enviando la variable Input (que contendrá todos los Input recibidos)
    // y la variable errors que contendrá los mensajes de error de validator.
    if ($validator->fails())
    {
      return Redirect::to('actividadEspecifica.create')
      ->withInput()
      ->withErrors($validator->messages());
    }

    // Si la validación es OK, estamos listos para almacenar en la base de datos los datos.
    ActividadEspecifica::create(array(
      'act_id'=>$request->input('act_id'),
      'nombre'=>$request->input('nombre'),
      'fecha_desde'=>$request->input('fecha_desde'),
      'fecha_hasta'=>$request->input('fecha_hasta'),
      'instancia'=>$request->input('instancia'),
      'puesto_mencion'=>$request->input('puesto_mencion'),
      'inst_referente'=>$request->input('inst_referente'),
      'inst_oferente'=>$request->input('inst_oferente'),
      'lugar'=>$request->input('lugar'),
      ));
    
    // Redireccionamos a users
    return Redirect::to('actividadEspecifica.index');
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //Se Mostrara una Actividad especifica determinada
    //return "Mostrando actividad especifica con id: $id";
    $actividadEspecifica=ActividadEspecifica::find($id);
    return view('actividadEspecifica.show', compact($actividadEspecifica,'actividadEspecifica'));
    //->with('actividadEspecifica', $actividadEspecifica);

    //En caso de que no Exista tal actividad especifica devolvemos un ErrorException
    /*if (!$actividadesEspecificas){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ninguna Actividad Especifica con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$actividadesEspecificas], 200);
    */
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //Se mostrara un formulario para editar una Actividad especifica determinada
    //return "Mostrando formulario para editar actividad especifica con id: $id";
    $actividadEspecifica = ActividadEspecifica::find($id);
        return view('actividadEspecifica.edit',compact($actividadEspecifica,'actividadEspecifica'));
    //return view(ActividadEspecifica.edit);
  }
  /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function update(Request $request, $id)
  {
     $rules=array(
      'act_id'=>'required', // Username es único en la tabla users
      'nombre'=>'required|min:30', // Username es único en la tabla users
      'fecha_desde'=>'required',
      'fecha_hasta'=>'required',
      'instancia'=>'required',
      'puesto_mencion'=>'required',
      'inst_referente'=>'required',
      'inst_oferente'=>'required',
      'lugar'=>'required',
      );
     
    // Llamamos a Validator pasándole las reglas de validación.
    $validator=Validator::make($request->all(),$rules);
    /* //no se $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);*/
    // Si falla la validación redireccionamos de nuevo al formulario
    // enviando la variable Input (que contendrá todos los Input recibidos)
    // y la variable errors que contendrá los mensajes de error de validator.
    if ($validator->fails())
    {
      return Redirect::to('actividadEspecifica.create')
      ->withInput()
      ->withErrors($validator->messages());
    }

    // Si la validación es OK, estamos listos para almacenar en la base de datos los datos.
    ActividadEspecifica::update(($request->all()));
    
    // Redireccionamos a users
    return Redirect::to('actividadesEspecificas.index')->with('success','Actividad actualizada satisfactoriamente');
       
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
       ActividadEspecifica::find($id)->delete();
        return Redirect::to('actividadEspecifica.index')->with('success','Actividad borrada satisfactoriamente');
  }
}
