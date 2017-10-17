<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferenteActEspController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($idReferente)
  {
    //Se Muestra todas las actividades especificas de un Referente determinado
    return "Mostrando las actividades especificas del Oferente con Id: $idReferente";
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($idReferente)
  {
      //Se muestra formulario para cargar una actividad especifica del Referente: $idReferente
     return "Mostrando formulario para cargar una actividad especifica del Referente";
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
  public function show($idReferente, $idActEsp)
  {
    //Se muestra una actividad especifica determinada de un Referente determinado
    return "Se muestra actividad especifica $idActEsp del Referente $idReferente";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($idReferente, $idActEsp)
  {
    //Se muestra formulario para editar actividad especifica determinada de un Referente determinado
    return "Se muestra formulario para editar la actividad especifica $idActEsp del Referente $idReferente";
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($idReferente, $idActEsp)
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
