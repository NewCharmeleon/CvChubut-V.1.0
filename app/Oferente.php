<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferente extends Model
{
  protected $table = 'oferentes';
  //Campos para llenado masivo
  protected $fillable = array('persona_id', 'actividad_id');
  //Campos que no se devuelven en la consulta
  protected $hidden = ['created_at','updated_at'];

  //Relaciones con otras tablas
  //1 oferente tiene un tipo de usuario
  /*public function user() {
    return $this->hasOne('App\User');
  }*/
  //1 oferente tiene info de 1 persona
  public function persona() {
    return $this->belongsTo('App\Persona');
  }
  //Relacion 1 a N
  //1 oferente tener muchas actividades especificas
  public function actividades(){
    return $this->hasMany('App\Actividad');
  }
}
