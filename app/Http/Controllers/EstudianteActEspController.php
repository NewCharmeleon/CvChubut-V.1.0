<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteActEspController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($idEstudiante)
  {
    //Se Muestra todas las actividades especificas de un estudiante determinado
    return "Mostrando las actividades especificas del estudiante con Id: $idEstudiante";
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($idEstudiante)
  {
      //Se muestra formulario para cargar una actividad especifica del estudiante: $idEstudiante
     return "Mostrando formulario para cargar una actividad especifica del estudiante";
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
  public function show($idEstudiante, $idActEsp)
  {
    //Se muestra una actividad especifica determinada de un estudiante determinado
    return "Se muestra actividad especifica $idActEsp del estudiante $idEstudiante";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($idEstudiante, $idActEsp)
  {
    //Se muestra formulario para editar actividad especifica determinada de un estudiante determinado
    return "Se muestra formulario para editar la actividad especifica $idActEsp del Estudiante $idEstudiante";
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($idEstudiante, $idActEsp)
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
