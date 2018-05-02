<?php

namespace App;
use App\Actividad;

use Illuminate\Database\Eloquent\Model;

class ActividadTipo extends Model
{
  protected $table = 'actividades_tipo';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   //Campos para llenado masivo
  protected $fillable = array('descripcion');

  protected $hidden =['created_at', 'updated_at'];

  //Relacion 1 a N
  //actividad_tipo puede tener muchas actividades

  public function actividades()
  {
    // 1 actividad puede tener muchos actividades especificas
    return $this->hasMany('Actividad::class');
  }
  /*public function actividadEspecifica()
  {
    // 1 actividad puede tener muchos actividades especificas
    return $this->;
  }*/

}
