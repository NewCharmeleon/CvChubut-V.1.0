<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbitoActividad extends Model
{
    //nombre de la Tabla a la cual referencia el Modelo

    protected $table = 'ambitos_actividades';

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
        return $this->hasMany(Actividad::class, 'ambito_actividad_id');
    }

    //establecemos los Accesors y Mutators a utilizar para la estandarizacion de los datos en la BBDD
    //Accesor de atributo Nombre automatico cuando llamamos a $ambitos_actividades->nombre;
    public function getNombreAttribute()
    {
        $nombre = $this->attributes["nombre"];
        $nombre = str_replace('_', ' ', $nombre);
        $nombre = ucwords($nombre);

        return $nombre;
    }
    //Accesor de atributo Descripcion automatico cuando llamamos a $ambitos_actividades->descripcion;
    public function getDescripcionAttribute(){
        
        //guardamos el valor del atributo en una variable
        $descripcion = $this->attributes['descripcion'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $descripcion = str_replace('_', ' ', $descripcion);
        //convertimos la primera letra del valor en mayuscula
        $descripcion = ucfirst( $descripcion);
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
