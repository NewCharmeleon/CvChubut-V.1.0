<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Estudiante;
use App\Role;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EstudianteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todos los estudiantes
    //return "Mostrando todos los estudiantes";
  /*  $estudiantes=Cache::remember('cacheestudiantes',15/60, function(){
      return Estudiante::simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$estudiantes->nextPageUrl(),'anterior'=>$estudiantes->previousPageUrl(),'data'=>$estudiantes->items()],200);
    */
    $rol='estudiante';
    $estudiante=Role::with('users')->where('roles.name',$rol)->paginate(15);
    if ($estudiante->isEmpty()){
        return
          response()->json(['errors'=>array(['code'=>404, 'message'=>'No Hay Usuarios con rol Estudiante'.$rol])], 404);
    }
    //Es recomendable devolver un array "errors" con los errores encontrados
    //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
    return response()->json(['status'=>'ok', 'data'=>$estudiante], 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    //Se Mostrara un estudiante determinada
    //return "Mostrando estudiante con id: $id";
    $estudiantes=Estudiante::findOrFail($id);

    //En caso de que no Exista tal estudiante devolvemos un ErrorException
    if (!$estudiantes){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ningun Estudiante con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$estudiantes], 200);
  }
    /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
}
