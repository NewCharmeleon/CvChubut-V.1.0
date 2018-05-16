<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\ActividadTipo;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ActividadTipoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todos los tipos de actividades generales
    //return "Mostrando tipos de actividades generales";
    /*$actividadesTipo=Cache::remember('cacheactividadesTipo',15/60, function(){
      return ActividadTipo::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$actividadesTipo->nextPageUrl(),'anterior'=>$actividadesTipo->previousPageUrl(),'data'=>$actividadesTipo->items()],200);*/
    $actividadTipo=actividadTipo::orderBy('id','DESC')->paginate(5);
      return view('actividadTipo.index', compact($actividadTipo,'actividadTipo'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //Se Mostrara un formulario para la carga de actividades generales
    //return "Mostrando formulario para crear un tipo de actividad general";
     $actividadTipo = new ActividadTipo();
    return view('actividadTipo.create')->with('actividadTipo', $actividadTipo);
  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {
    /// Realizamos la validación de datos recibidos del formulario.
    $rules=array(
      
      'tipo'=>'required', // Username es único en la tabla users
      'nombre'=>'required|min:5, max:255',
      'descripcion'=>'required|min:5, max:255',
      
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
      return Redirect::to('actividadTipo.create')
      ->withInput()
      ->withErrors($validator->messages());
    }

    // Si la validación es OK, estamos listos para almacenar en la base de datos los datos.
    ActividadTipo::create(array(
      'tipo'=>$request->input('tipo'),
      'nombre'=>$request->input('nombre'),
      'descripcion'=>$request->input('descripcion'),
      
      ));
    
    // Redireccionamos a users
    return Redirect::to('actividadTipo.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //Se Mostrara un tipo de Actividad determinado
    //return "Mostrando tipo de actividad general con id: $id";
    //$actividadesTipo=ActividadTipo::find($id);

    //En caso de que no Exista tal usuario devolvemos un ErrorException
    //if (!$actividadesTipo){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
     // return
      /*response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ningun Tipo de Actividad con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$actividadesTipo], 200);*/
    $actividadTipo=ActividadTipo::find($id);
    return view('actividadTipo.show', compact($actividadTipo,'actividadTipo'));
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //Se mostrara un formulario para editar un Tipo de Actividad General determinada
    //return "Mostrando formulario para editar tipo de actividad general con id: $id";
    $actividadTipo = ActividadTipo::find($id);
        return view('actividadTipo.edit',compact($actividadTipo,'actividadTipo'));
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
      
      'tipo'=>'required', // Username es único en la tabla users
      'nombre'=>'required|min:5, max:255',
      'descripcion'=>'required|min:5, max:255',
      
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
      return Redirect::to('actividadTipo.edit')
      ->withInput()
      ->withErrors($validator->messages());
    }

    // Si la validación es OK, estamos listos para almacenar en la base de datos los datos.
    ActividadEspecifica::update(($request->all()));
    
    // Redireccionamos a users
    return Redirect::to('actividadesEspecificas.index')->with('success','Tipo de Actividad actualizada satisfactoriamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      ActividadTipo::find($id)->delete();
        return Redirect::to('actividadTipo.index')->with('success','Tipo de Actividad borrada satisfactoriamente');
  }
}
