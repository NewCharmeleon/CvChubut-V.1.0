<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
   protected $table = 'carreras';
   protected $fillable = [
        'descripcion'
    ];

	//metodo static con valores por defecto para crear
	public static function form(){
	  return ['descripcion' => ''];

    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
      }
	}

}
