<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
//Agregamos los dos modelos a usuario
use App\ActividadTipo;
use App\Actividad;
use App\ActividadEspecifica;


class ActividadTipoActividadEspecificaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   //Configuramos en el constructor del controlador la autenticacion
   //usando el Middleware auth.basic pero solamante a store, update y destroy.

  public function __construct(){
    $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
  }

  public function index($idActividadTipo,$idActividad)
  {
    //Se Muestra el tipo de Usuario de una Persona determinada
    //return "Mostrando la Persona con Usuario id: $idPerson";
    //$actividadTipo=Actividad::find($idActividad)->whereIn('act_tipo_id',$idActividadTipo)->get();
    //$actividadEspecifica=ActividadEspecifica::with('actividades.actividades_tipo')->where('act_id',$idActividad)->whereIn('act_tipo_id',$idActividadTipo)->get();
    //$actividadEspecifica=ActividadEspecifica::$actividadEspecifica;
    //$actividadesTipo=ActividadTipo::find($idActividadTipo);
    //Tomamos el dato que solicita el tipo de actividad solicitada
    $actividadTipo=Actividad::where('act_tipo_id',$idActividadTipo)->get();
    //Verificamos que al tipo de actividad exista
    if ($actividadTipo->isEmpty()){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra
      actividades del tipo: '.$idActividadTipo])], 404);
    }
    //tomamos la actividad general solicitada
    $actividadEspecifica=ActividadEspecifica::where('act_id', $idActividad)->get();
    if ($actividadEspecifica->isEmpty()){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra
      actividades especificas del tipo: '.$idActividad])], 404);
    }
    //$prueba=DB::table('')
    //$actividad=$actividadTipo.$actividadEspecifica;
    //$actividad=$actividadEspecifica->where('act_tipo_id',$idActividadTipo);
    $actividad=ActividadTipo::with('actividades.actividades_especifica')->find($idActividadTipo);
    //->where('act_tipo_id',$idActividad);
    //->where('actividades.act_tipo_id',$idActividadTipo)->get();
    //->where('actividades_especificas.act_id',$idActividad)->get();
    //->where('act_tipo_id', $idActividadTipo)->whereIn('act_id', $idActividad)->get();
    //$actividadTipo->where('actividades_tipo.id',$idActividad);
      //$actividadesTipo=ActividadTipo::find($idActividadTipo);
      //  $actividadesEspecifica=$actividades->actividadesEspecifica()->get();
  //  $actividad=$actividadTipo->where('actividades_especifica.act_id',$idActividad)->get();
  if ((!$actividad)&&($actividad->actividades_especificas==null)){//->isEmpty()){
    //Es recomendable devolver un array "errors" con los errores encontrados
    //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
    return
    response()->json(['errors'=>array(['code'=>404, 'message'=>'No existen actividades especificas
    de actividades generales con id:'.$idActividad.'del tipo: '.$idActividadTipo])], 404);
    }
  return
    response()->json(['status'=>'ok', 'data'=>$actividad], 200);
  }
      /*
    if (! $actividadesEspecifica){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra
      actividades especificas de ese tipo.'])], 404);
    }
    //Recomendable devolver un objeto con propiedad "data" con el array de
    //resultados dentro de esa propiedad.
    return
    response()->json(['status'=>'ok', 'data'=>$actividadesEspecifica], 200);
    //response()->json(['status'=>'ok', 'data'=>$persona->users()], 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($idPersona)
  {
      //Se muestra formulario para cargar un Usuario a la Persona: $idPersona
     return "Mostrando formulario para cargar un Usuario y Rol especifico a la Persona: $idPersona";
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
  public function show($idPersona, $idUsuario)
  {
    //Se muestra un tipo de Usuario especifico de una Persona determinada
    return "Se muestra tipo de Usuario especifico $idUsuario de la Persona $idPersona";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($idPersona, $idUsuario)
  {
    //Se muestra formulario para editar tipo de Usuario especifico determinado de una Persona determinada
    return "Se muestra formulario para editar el Rol de Usuario $idUsuario de la Persona $idPersona";
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($idPersona, $idUsuario)
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
