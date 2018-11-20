<?php

namespace App;
//use App\Role;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
//agregado para el borrado logico
use SoftDeletes;

class Persona extends Model
{

    protected $table = "personas";

    //atributo para usar el SoftDelete
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_apellido',
        'dni',
        'nacionalidad',
        'fecha_nac',
        'telefono',
        'user_id',
        'carrera_id',
        
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'carrera_id');
    }

    public function experiencias_laborales()
    {
        return $this->hasMany(ExperienciaLaboral::class, 'persona_id');
    }

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'persona_id');
    }

    //setter 
    // nombre y apellido
    public function  setNombreApellidoAttribute( $value = "" ){
        //tratamiento a nombre apellido
        $value = trim($value); //saca los espacion del principio y fin
        $value = str_replace(' ','_',$value); //cambia los espacios por _
        $value = strtolower($value);
        $this->attributes['nombre_apellido'] = $value;
    }
    //dni
    public function  setDniAttribute( $value = "" ){
        //tratamiento del valor
        $value = trim($value); //saca los espacion del principio y fin
        $value = str_replace('.', '', $value); //cambia los puntos por nada
        $value = str_replace(' ', '', $value); //cambia los puntos por nada

        $this->attributes['dni'] = $value;

    }
    //fecha nacimiento
    public function setFechaNacAttribute($value = "01-01-1910")
    {
        //tratamiento del valor
        $value = Carbon::parse( $value );
        $value = $value->format('Y-m-d');

        $this->attributes['fecha_nac'] = $value;
    }

     //telefono
    public function setTelefonoAttribute($value = "")
    {
        //tratamiento del valor
        $value = trim($value); //saca los espacion del principio y fin
        $value = str_replace(')', '', $value); //cambia los parentesis por nada
        $value = str_replace('(', '', $value); //cambia los parentesis por nada
        $value = str_replace('.', '', $value); //cambia los puntos por nada
        $value = str_replace('_', '', $value); //cambia los guion por nada
        $value = str_replace(' ', '', $value); //cambia los espacios por nada

        $this->attributes['telefono'] = $value;
    }

    //getter
    // nombre y apellido
    public function getNombreApellidoAttribute()
    {   
        $nombre_apellido = $this->attributes['nombre_apellido'];
        //tratamiento a nombre apellido
        $nombre_apellido = str_replace('_', ' ', $nombre_apellido); //cambia los espacios por _
        $nombre_apellido = ucwords($nombre_apellido);
         return $nombre_apellido;
    }
    // fecha naciemiento 
    public function getFechaNacimientoAttribute()
    {
        //tratamiento del valor
        $value = Carbon::parse($this->attributes['fecha_nac']);
        $value = $value->format('d-m-Y');

        return $value;
    }

    
    


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


}
