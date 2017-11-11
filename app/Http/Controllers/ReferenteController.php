<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Persona;
use App\Role;
use App\User;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReferenteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //Se Mostrara todas los referentes
    //return "Mostrando todos los referentes";
    /*$referentes=Cache::remember('cachereferentes',15/60, function(){
      return Referente::simplePaginate(10);
    });*/
    $role='3';
    $rol=User::where('role_user.users_id','=','personas.user_id')->get();//->whereIn("role_user.role_id","=", '3')->get();
    //$rol= Role::where("role_id", "=", '3')->get();
    dd($rol);
    //$referentes=Persona::where("user_id", "=" , $rol);
    //dd($referentes);
    //$referentes = Referente::has('roles.id=3');
    return response()->json(['status'=>'ok', 'siguiente'=>$rol->nextPageUrl(),'anterior'=>$rol->previousPageUrl(),'data'=>$rol->items()],200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //Se Mostrara un formulario para la carga de referentes
    return "Mostrando formulario para cargar un referente";
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
    //Se Mostrara un referente determinado
    //return "Mostrando referente con id: $id";
    $referentes=Referente::findOrFail($id);

    //En caso de que no Exista tal Referente devolvemos un ErrorException
    if (!$referentes){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ningun Referente con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$referentes], 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //Se mostrara un formulario para editar un referente determinado
    return "Mostrando formulario para editar referente con id: $id";
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
