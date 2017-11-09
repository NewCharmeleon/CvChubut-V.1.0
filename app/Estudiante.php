<?php

namespace App;

use App\Carrera;
use App\Actividad;
use App\Legajo;

class Estudiante extends Persona
{
  //Nombre de la tabla
  protected $table = 'estudiantes';
  /*Campos para llenado masivo
  protected $fillable = array('persona_id',
                              'carrera_id',
                              'actividad_id',
                              'legajo_id');
  //Campos que no se devuelven en la consulta
  protected $hidden = ['created_at','updated_at'];

  */
  //Relaciones con otras tablas
  //Relacion 1 a N
  //Muchos estudiantes pueden pertenecen a una Carrera
  public function carrera(){
   return $this->belongsTo('Carrera::class');
  }
  //1 estudiante tiene un legajo
  public function legajo(){
   return $this->belongsTo('Legajo::class');
  }
  //1 estudiante puede tener muchas actividades
  public function actividades(){
    return $this->hasMany('Actividad::class');
  }
  //1 estudiante tiene 1 tipo de usuario
  /*public function user() {
    return $this->hasOne('App\User');
  }*/
  //1 estudiante tiene info de 1 persona
  /*public function persona() {
    return $this->hasOne('App\Persona');
  }
  //1 estudiante tiene 1 legajo
  public function legajo() {
    return $this->hasOne('App\Legajo');
  }*/
}
