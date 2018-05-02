<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Persona;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todas las personas
    //return "Mostrando todas las personas";
    //return response()->json(['status'=>'ok', 'data'=>Persona::all()], 200);
    $personas=Cache::remember('cachepersonas',15/60, function(){
      return Persona::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$personas->nextPageUrl(),'anterior'=>$personas->previousPageUrl(),'data'=>$personas->items()],200);

  }


  /*
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //Se Mostrara una personas determinada
    //return "Mostrando persona con id: $id";
    $persona=Persona::find($id);

    //En caso de que no Exista tal usuario devolvemos un ErrorException
    if (!$persona){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra
      ninguna Persona con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$persona], 200);
  }

  
}
