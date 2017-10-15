<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legajo extends Model
{
	//Nombre de la tabla
	protected $table = 'legajos';
	//Campos para llenado masivo
	protected $fillable = array('descripcion');
	//Campos que no se devuelven en la consulta
	protected $hidden = ['created_at','updated_at'];

	//Relaciones con otras tablas

	//Relacion 1 a 1

	//1 legajo pertenece a 1 estudiante
	public function estudiante() {
				return $this->belongsTo('App\Estudiante');
	}





  }
}
