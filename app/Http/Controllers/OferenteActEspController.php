<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferente;
use App\ActividadEspecifica;
use App\ActividadTipo;
use App\Actividad;

class OferenteActEspController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($idOferente)
  {
    //Se Muestra todas las actividades especificas de un Oferente determinado
    //return "Mostrando las actividades especificas del Oferente con Id: $idOferente";
    //Procedemos a devolver todas las actividades especificas de un Oferente determinado
    $oferente=Oferente::findOrFail($idOferente);
    if (! $oferente)
    {
      //Devolvemos un array "errors" con los errores encontrados y cabecera HTTP 404.
      return
        response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra
        un Oferente con ese Id.'])], 404);
    }
    return
      response()->json(['status'=>'ok','data'=>$oferente->actividad_id->get()], 200);
      //response()->json(['status'=>'ok','data'=>$oferente->actividades], 200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($idOferente)
  {
      //Se muestra formulario para cargar una actividad especifica del estudiante: $idEstudiante
     return "Mostrando formulario para cargar una actividad especifica del Oferente";
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $oferente_id)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($idOferente, $idActEsp)
  {
    //Se muestra una actividad especifica determinada de un Oferente determinado
    return "Se muestra actividad especifica $idActEsp del Oferente $idOferente";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($idOferente, $idActEsp)
  {
    //Se muestra formulario para editar actividad especifica determinada de un Oferente determinado
    return "Se muestra formulario para editar la actividad especifica $idActEsp del Oferente $idOferente";
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($idOferente, $idActEsp)
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
