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
    $actividadesEspecificas=Cache::remember('cacheusers',15/60, function(){
      return ActividadEspecifica::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$actividadesEspecificas->nextPageUrl(),'anterior'=>$actividadesEspecificas->previousPageUrl(),'data'=>$actividadesEspecificas->items()],200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //Se Mostrara un formulario para la carga de actividades especificas
    return response()
                ->json([
                    'form' => ActividadEspecifica::form(),
                    'option' => []
                ]);
    //return "Mostrando formulario para crear una actividad especifica";
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
    //Se Mostrara una Actividad especifica determinada
    //return "Mostrando actividad especifica con id: $id";
    $actividadesEspecificas=ActividadEspecifica::find($id);

    //En caso de que no Exista tal actividad especifica devolvemos un ErrorException
    if (!$actividadesEspecificas){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ninguna Actividad Especifica con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$actividadesEspecificas], 200);
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
    return "Mostrando formulario para editar actividad especifica con id: $id";
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
