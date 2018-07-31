<?php

namespace App;
use App\Actividad;

use Illuminate\Database\Eloquent\Model;

class ActividadTipo extends Model
{
    //nombre de la Tabla a la cual referencia el Modelo

    protected $table = 'actividades_tipo';

    //atributos a llenar del Modelo

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    //atributos ocultos
    protected $hidden =['created_at', 'updated_at'];

    //establecemos las relaciones a otros Modelos
    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'actividad_tipo_id');
    }

    //establecemos los Accesors y Mutators a utilizar para la estandarizacion de los datos en la BBDD
    //Accesor de atributo Nombre automatico cuando llamamos a $actividades_tipo->nombre;
    public function getNombreAttribute(){
        
        //guardamos el valor del atributo en una variable
        $nombre = $this->attributtes['nombre'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $nombre = str_replace('_', ' ', $nombre);
        //convertimos la primera letra de cada palabra en mayuscula
        $nombre = ucwords( $nombre);
        //devolvemos el valor del attributo ya tratado
        return $nombre;
    }
    //Accesor de atributo Descripcion automatico cuando llamamos a $actividades_tipo->descripcion;
    public function getDescripcionAttribute(){
        
        //guardamos el valor del atributo en una variable
        $descripcion = $this->attributtes['descripcion'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $descripcion = str_replace('_', ' ', $descripcion);
        
        //devolvemos el valor del attributo ya tratado
        return $descripcion;
    }

    public function setNombreAttribute($value = "")
    {
        //sacamos los espacios del valor recibido
       $value = trim( $value );
       //reemplazamos los espacios en guiones del valor recibido
       $value = str_replace( ' ','_', $value);
       //convertimos el valor recibido a minusculas
       $value = strtolower( $value );
       //asignamos el valor al atributo del Modelo
       $this->attributes['nombre'] = $value;
           
    }
    //Mutator de atributo Descripcion a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setDescripcionAttribute( $value = "")
    {
        
         //sacamos los espacios del valor recibido
         $value = trim( $value );
        //reemplazamos los espacios en guiones del valor recibido
        $value = str_replace( ' ','_', $value);
        //convertimos el valor recibido a minusculas
        $value = strtolower( $value );
        //asignamos el valor al atributo del Modelo
        $this->attributes['descripcion'] = $value;
    }

}
