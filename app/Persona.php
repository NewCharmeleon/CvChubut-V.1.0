<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
	 protected $fillable = [
        'nombre', 'user_id', 'dni', 'nacionalidad', 'direccion', 'fecha_nac','telefono'
    ];



  public static function form(){
	  return ['nombre' => '', 'user_id' => 0,'dni' => 0, 'nacionalidad' =>'', 'direccion' => '', 'fecha_nac' => '', 'telefono' => ''];
	}
	public function users(){
  	return $this->belongsTo('App\User');
	}
	public function estudiantes() {
			return $this->hasMany('App\Estudiante');
		}
		public function oferentes(){
        return $this->hasMany('App\Oferente');
    }
		public function referentes(){
        return $this->hasMany('App\Referente');
    }
}
