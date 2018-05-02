<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
  //Nombre de la tabla
  protected $table = 'carreras';
  //Campos para llenado masivo
  protected $fillable = array('descripcion');
  //Campos que no seran devueltos por la consulta
  protected $hidden = ['created_at','updated_at'];

  //Relacion 1 a N
  //1 carrera puede tener muchos estudiantes
  public function estudiantes()
  {
    return $this->hasMany('App\Estudiante');
  }
}
