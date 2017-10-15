<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referente extends Model
{
  protected $table = 'referentes';
  //Campos para llenado masivo
  protected $fillable = array('persona_id', 'actividad_id');
  //Campos que no se devuelven en la consulta
  protected $hidden = ['created_at','updated_at'];

  //Relaciones con otras tablas
  //Relacion 1 a N
  //1 referente tiene 1 tipo de usuario
  /*public function user() {
    return $this->hasOne('App\User');
  }*/
  //1 referente tiene info de 1 persona
  public function persona() {
    return $this->hasOne('App\Persona');
  }
  //1 referente puede tener muchas actividades especificas
  public function actividades(){
    return $this->hasMany('App\Actividad');
  }
}
