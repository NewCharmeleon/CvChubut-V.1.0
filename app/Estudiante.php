<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $table = 'estudiantes';
  //
  protected $fillable = [
    'persona_id', 'carrera_id'
  ];
  public static function form(){
	  return ['persona_id' => '', 'carrera_id'=> ''];

  public function carreras(){
    	return $this->belongsTo('App\Carrera');
  	}
    public function personas() {
        return $this->hasOne('Persona::class');
    }
    public function actividades(){
          return $this->hasMany('App\Actividad');
    }  

  }
}
