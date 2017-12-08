<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Carrera;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CarreraController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todas las carreras
    //return "Mostrando todas las carreras";
    $carreras=Cache::remember('cachecarreras',15/60, function(){
      return Carrera::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$carreras->nextPageUrl(),'anterior'=>$carreras->previousPageUrl(),'data'=>$carreras->items()],200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    //Se Mostrara una carrera determinada
    //return "Mostrando informacion de la carrera con id: $id";
    $carreras=Carrera::findOrFail($id);

    //En caso de que no Exista tal carrera devolvemos un ErrorException
    if (!$carreras){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ninguna Carrera con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$carreras], 200);
  }
  

}
