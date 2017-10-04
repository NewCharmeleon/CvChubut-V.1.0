<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actividad;
use App\actividadesTipo;
use App\ActividadEspecifica;

class ActividadEspecifica extends Model
{
  protected $table = 'actividades_especifica';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre', 'fecha_desde', 'fecha_hasta', 'instancia', 'puesto_mencion',
      'inst_referente', 'inst_oferente', 'lugar','descripcion',
  ];
  //metodo static con valores por defecto para crear
  public static function form(){
    $fecha = mktime(date("Y"), date("m"), date("d"));
    $tipoAct = 'Actividad'->'id_tipo_act';
    return ['nombre' => '', 'tipo_actividad' => '','fecha_desde' =>$fecha, 'fecha_hasta' =>$fecha,
    'instancia' => '', 'puesto_mencion' =>'','inst_referente' => '',
    'inst_oferente' => '', 'lugar' =>'','descripcion' =>''];

  }
}
