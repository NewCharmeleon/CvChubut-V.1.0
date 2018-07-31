<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Http\Controllers\Entrust;
use Carbon\Carbon;
class Persona extends Model
{
	protected $table = 'personas';
	
	protected $fillable = [
		'nombre_apellido',
		'dni',
		'nacionalidad',
		'fecha_nac',
		'telefono',
		'user_id',
		'carrera_id',
  ];
	//Campos que no se devuelven en la consulta
	protected $hidden = ['created_at','updated_at'];
  /*public static function form(){
	  return ['nombre' => '', 'user_id' => 0,'dni' => 0, 'nacionalidad' =>'', 'direccion' => '', 'fecha_nac' => '', 'telefono' => ''];
	}*/
	//Roles del Modelo Persona
	public function usuario(){
  	return $this->belongsTo('App\User', 'user_id');
	}

	public function carrera(){
  	return $this->belongsTo(Carrera::class, 'carrera_id');
	}

	public function experiencias_laborales(){
  	return $this->hasMany(ExperienciaLaboral::class, 'persona_id');
	}

	//Mutators para tratar los atributos estandarizado en la Base de Datos
	
	//atributo Nombre y Apellido
	public function setNombreApellidoAttribute( $value = '' )
	{
		//sacamos los espacios
		$value = trim($value);
		//reemplazamos los espacios por guiones
		$value = str_replace(' ', '_', $value);
		//convertimos el valor a minusculas
		$value = strtolower($value);
		//asignamos el valor
		$this->attributes['nombre_apellido'] = $value;

	}
	
	//atributo Dni
	public function setDniAttribute( $value = '' )
	{
		//sacamos los espacios
		$value = trim($value);
		//reemplazamos los puntos por vacio
		$value = str_replace('.', '', $value);
		//reemplazamos los espacios por vacio
		$value = str_replace(' ', '', $value);
		//asignamos el valor
		$this->attributes['dni'] = $value;

	}
	//atributo Fecha de Nacimiento
	public function setFechaNacAttribute( $value = '01-01-1910' )
	{
		//parseamos el valor
		$value = Carbon::parse($value);
		//cambiamos el formato del valor
		$value = $value->format('Y-m-d');
		
		//asignamos el valor
		$this->attributes['fecha_nac'] = $value;

	}
	//atributo Telefono
	public function setTelefonoAttribute( $value = '' )
	{
		//sacamos los espacios
		$value = trim($value);
		//reemplazamos un parentesis ')' por vacio
		$value = str_replace(')', '', $value);
		//reemplazamos un parentesis '(' por vacio
		$value = str_replace('(', '', $value);
		//reemplazamos un punto '.' por vacio
		$value = str_replace('.'. '', $value);
		//reemplazamos los guiones '-' por vacio
		$value = str_replace('-', '', $value);
		//reemplazamos los espacios por vacio
		$value = str_replace(' ', '', $value);

		//asignamos el valor
		$this->attributes['telefono'] = $value;

	}
	
	//Accesor para tratar los atributos estandarizado en la Base de Datos
	
	//atributo Nombre y Apellido
	public function getNombreApellidoAttribute()
	{
		//tomamos el valor y lo asignamos a una variable
		$nombre_apellido = $this->attributes['nombre_apellido'];
		//reemplazamos los guiones por espacios
		$nombre_apellido = str_replace('_', ' ', $nombre_apellido);
		//reemplazamos la primera inicial en Mayuscula
		$nombre_apellido = ucwords($nombre_apellido);
		
		//devolvemos el valor en forma legible
		return $nombre_apellido;

	}
	//atributo Fecha de Nacimiento
	public function getFechaNacimientoAttribute()
	{
		//tomamos el valor y lo parseamos en una variable
		$value = Carbon::parse($this->attributes['fecha_nac']);
		//formateamos el valor
		$value = $value->format('d-m-Y');
		
		
		//devolvemos el valor en forma legible
		return $value;

	}
	//atributo Nacionalidad
	public function getNacionalidadAttribute()
	{
		//tomamos el valor y lo asignamos a una variable
		$value = $this->attributes['nacionalidad'];
		
		//en caso que no tenga Nacionalidad devolvemos una de las opciones
		return ( empty($value) )? 'no tiene Nacionalidad registrada' :$value;
		

	}
		
	//arreglo de Nacionalidades
	public static function nacionalidades (){
		return [
					"n/c",
					"Alemana" ,
					"Argentina",
					"Australiana" ,
					"Boliviana" ,
					"Brasileña" ,
					"Belga" ,
					'Canadiense' ,
					"Chileno" ,
					"China" ,
					"Colombiana" ,
					"Danesa" ,
					"Ecuatoriana" ,
					"Egipcia" ,
					"Española" ,
					"Estadounidense" ,
					"Francesa" ,
					"Griega" ,
					"India" ,
					"Inglesa" ,
					"Israeli" ,
					"Italiana" ,
					"Japonesa",
					"Marroqui" ,
					"Mexicana",
					"Panameña",
					"Paraguaya" ,
					"Peruana"  ,
					"Polaca",
					"Portuguésa",
					"Checa" ,
					"Rusa" ,
					"Sueca" ,
					"Turca",
					"Uruguaya" ,
					"Venezolana"
		];	
	}	
	/*
	public function estudiantes(){
		return $this->hasMany('App\Estudiante', 'persona_id');
	}
	public function oferentes(){
    return $this->hasMany('App\Oferente');
  }
	public function referentes(){
    return $this->hasMany('App\Referente');
  }*/

}
