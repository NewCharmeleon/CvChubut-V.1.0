<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Actividad;
use App\actividadesTipo;
//use App\ActividadEspecifica;

class ActividadTipo extends Model
{
  protected $table = 'actividades_tipo';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'descripcion'
  ];
  //metodo static con valores por defecto para crear
  public static function form(){

    return ['descripcion' =>''];

  }
}
