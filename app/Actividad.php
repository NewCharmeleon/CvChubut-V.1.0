<?php

namespace App;
use App\ActividadTipo;
use App\ActividadEspecifica;

use Illuminate\Database\Eloquent\Model;


class Actividad extends Model
{
  //Cambio del nombre de la tabla
  protected $table = 'actividades';
  //Clave primaria
  //protected $primaryKey = 'act_tipo_id';
  //Campos para llenado masivo
  protected $fillable = [
    'act_tipo_id','nombre', 'descripcion'
  ];
  //atributos que no se devuelven en las consultas
  protected $hidden = ['created_at','updated_at'];
  // Definimos a continuación la relación de esta tabla con otras.

  // Relación de actividad con actividades especificas
  public function actividades_especifica()
  {
    // 1 actividad puede tener muchos actividades especificas
    return $this->hasMany('ActividadEspecifica::class');
  }
  // Relación de actividad con actividades tipo
  //1 actividad pertenece a un tipo de actividad
  public function actividad_tipo()
  {
    // 1 actividad pertenece a un tipo de actividad especifica
    return $this->belongsTo('ActividadTipo::class');
  }
  public static function form(){
    return [
      'act_tipo_id' => $ActividadTipo->nombre,
      'nombre' =>'',
      'descripcion' => ''];
  }
}
