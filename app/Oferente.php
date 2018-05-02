<?php

namespace App;

use App\Actividad;
//use Illuminate\Database\Eloquent\Model;

class Oferente extends Persona
{
  protected $table = 'oferentes';
  //Campos para llenado masivo
  /*protected $fillable = array('persona_id', 'actividad_id');
  //Campos que no se devuelven en la consulta
  protected $hidden = ['created_at','updated_at'];*/

  //Relaciones con otras tablas
  //1 oferente tiene un tipo de usuario
  public function actividades(){
    return $this->hasMany('Actividad::class');
  }
}
