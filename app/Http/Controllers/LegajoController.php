<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Legajo;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LegajoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todos los legajos
    //return "Mostrando todas los legajos";
    $legajos=Cache::remember('cachelegajos',15/60, function(){
      return Legajo::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$legajos->nextPageUrl(),'anterior'=>$legajos->previousPageUrl(),'data'=>$legajos->items()],200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    //Se Mostrara un legajo determinado
    //return "Mostrando informacion de legajo con id: $id";
    //Se Mostrara un oferente determinado
    //return "Mostrando oferente con id: $id";
    $legajos=Legajo::findOrFail($id);

    //En caso de que no Exista tal legajo devolvemos un ErrorException
    if (!$legajos){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ningun Legajo con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$legajos], 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
}
