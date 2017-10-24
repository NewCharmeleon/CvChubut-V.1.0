<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Actividad;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ActividadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todas las actividades generales
    //return "Mostrando todas las actividades generales";
    $actividades=Cache::remember('cacheactividades',15/60, function(){
      return Actividad::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$actividades->nextPageUrl(),'anterior'=>$actividades->previousPageUrl(),'data'=>$actividades->items()],200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //Se Mostrara un formulario para la carga de actividades generales
    return "Mostrando formulario para crear una actividad general";
  }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //Se Mostrara una Actividad General determinada
    //return "Mostrando actividad general con id: $id";
    $actividades=Actividad::findOrFail($id);

    //En caso de que no Exista tal actividad devolvemos un ErrorException
    if (!$actividades){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ninguna Actividad General con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$actividades], 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //Se mostrara un formulario para editar una Actividad General determinada
    return "Mostrando formulario para editar actividad general con id: $id";
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
    }
}
