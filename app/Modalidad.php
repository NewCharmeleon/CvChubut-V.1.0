<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
   //nombre de la Tabla a la cual referencia el Modelo

   protected $table = 'modalidades';

   //atributos a llenar del Modelo

   protected $fillable = [
       'nombre',
       'descripcion'
   ];

   //establecemos las relaciones a otros Modelos
   public function actividades()
   {
       return $this->hasMany(Actividad::class, 'modalidad_id');
   }

   //establecemos los Accesors y Mutators a utilizar para la estandarizacion de los datos en la BBDD
   //Accesor de atributo Nombre automatico cuando llamamos a $carrera->nombre;
   public function getNombreAttribute(){
       
       //guardamos el valor del atributo en una variable
       $nombre = $this->attributes['nombre'];
       //reemplazamos los guiones por espacios para una mejor lectura del dato
       $nombre = str_replace('_', ' ', $nombre);
       //convertimos la primera letra de cada palabra en mayuscula
       $nombre = ucwords( $nombre);
       //devolvemos el valor del attributo ya tratado
       return $nombre;
   }
   //Accesor de atributo Descripcion automatico cuando llamamos a $carrera->nombre;
   public function getDescripcionAttribute(){
       
    //guardamos el valor del atributo en una variable
    $descripcion = $this->attributes['descripcion'];
    //reemplazamos los guiones por espacios para una mejor lectura del dato
    $descripcion = str_replace('_', ' ', $descripcion);
    //convertimos la primera letra de la primer palabra en mayuscula
    $descripcion = ucfirst( $descripcion);
    //devolvemos el valor del attributo ya tratado
    return $descripcion;
}

   //Mutator de atributo Nombre a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setNombreAttribute( $value = ""){
       
       //reemplazamos los espacios en guiones del valor recibido
       $value = str_replace( ' ','_', $value);
       //convertimos el valor recibido a minusculas
       $value = strtolower( $value );
       //asignamos el valor al atributo del Modelo
       $this->attributes['nombre'] = $value;

   }
   public function setDescripcionAttribute( $value = ""){
       
    //sacamos los espacios al valor recibido
    $value = trim($value);
    //reemplazamos los espacios en guiones del valor recibido
    $value = str_replace( ' ','_', $value);
    //convertimos el valor recibido a minusculas
    $value = strtolower( $value );
    //asignamos el valor al atributo del Modelo
    $this->attributes['descripcion'] = $value;
   }
}
