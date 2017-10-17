<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPersonaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($idPersona)
  {
    //Se Muestra el tipo de Usuario de una Persona determinada
    return "Mostrando la Persona con Usuario id: $idPerson";
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
