<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  //Nombre de la tabla
  protected $table = 'estudiantes';
  //Campos para llenado masivo
  protected $fillable = [
    'user_id','persona_id', 'carrera_id', 'actividad_id', 'legajo_id'
  ];
  //Campos que no se devuelven en la consulta
  protected $hidden = ['created_at','updated_at'];

  //Relaciones con otras tablas

  //Relacion 1 a N
  //Muchos estudiantes pueden pertenecen a una Carrera
  public function carreras(){
    	return $this->belongsTo('App\Carrera');
  }
  //1 estudiante puede tener muchas actividades especificas
  public function actividades_especifica(){
        return $this->hasMany('App\ActividadEspecifica');
  }
  //1 estudiante tiene 1 tipo de usuario
  public function user() {
        return $this->hasOne('App\User');
  }
  //1 estudiante tiene info de 1 persona
  public function persona() {
        return $this->hasOne('App\Persona');
  }
  //1 estudiante tiene 1 legajo
  public function legajo() {
        return $this->hasOne('App\Legajo');
  }



}
