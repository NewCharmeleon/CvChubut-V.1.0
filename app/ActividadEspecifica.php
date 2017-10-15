<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadEspecifica extends Model
{
  protected $table = 'actividades_especifica';
  //Campos llenado masivo
  protected $fillable = array(
    'act_id','nombre', 'fecha_desde', 'fecha_hasta', 'instancia', 'puesto_mencion',
    'inst_referente', 'inst_oferente', 'lugar'
  );
  protected $hidden = ['created_at','updated_at'];

  //Relacion 1 a N
  //actividad_especifica pertenece a actividad(Intelectuales, deportivas, etc)
  public function actividad()
  {
    // 1 actividad puede tener muchos actividades especificas
    return $this->belongsTo('App\Actividad');
  }
  /*//Relacion N a 1
  //muchas actividad_especifica pertenecen a 1 estudiante
  public function actividades_especifica()
  {
    return $this->belongsTo('App\Estudiante');
  }*/
}
