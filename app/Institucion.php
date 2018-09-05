<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
     //nombre de la Tabla a la cual referencia el Modelo

   protected $table = 'instituciones';

   //atributos a llenar del Modelo

   protected $fillable = [
       'nombre',
       'localidad',
       'provincia',
       'pais',
    
    ];

   //establecemos las relaciones a otros Modelos
   public function actividades()
   {
       return $this->hasMany(Actividad::class, 'institucion_id');
   }

   //establecemos los Accesors y Mutators a utilizar para la estandarizacion de los datos en la BBDD
   //Accesor de atributo Nombre automatico cuando llamamos a $experiencialaboral->puesto;
   public function getNombreAttribute(){
       
       //guardamos el valor del atributo en una variable
       $nombre = $this->attributes['nombre'];
       //reemplazamos los guiones por espacios para una mejor lectura del dato
       $nombre = str_replace('_', ' ', $nombre);
       //convertimos la primera letra del valor en mayuscula
       $nombre = ucfirst( $nombre);
       //devolvemos el valor del attributo ya tratado
       return $nombre;
   }
   //Accesor de atributo Localidad automatico cuando llamamos a $experiencialaboral->nombre;
   public function getLocalidadAttribute(){
       
        //guardamos el valor del atributo en una variable
        $localidad = $this->attributes['localidad'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $localidad = str_replace('_', ' ', $localidad);
        //convertimos la primera letra del valor en mayuscula
        $localidad = ucwords($localidad);
        //devolvemos el valor del attributo ya tratado
        return empty($localidad) ? '--' : $localidad;
    }
     //Accesor de atributo Provincia automatico cuando llamamos a $experiencialaboral->nombre;
   public function getProvinciaAttribute(){
       
        //guardamos el valor del atributo en una variable
        $provincia = $this->attributes['provincia'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $provincia = str_replace('_', ' ', $provincia);
        //convertimos la primera letra del valor en mayuscula
        $provincia = ucwords($provincia);
        //devolvemos el valor del attributo ya tratado
        return empty($provincia) ? '--' : $provincia;
    }
     //Accesor de atributo Pais automatico cuando llamamos a $experiencialaboral->nombre;
   public function getPaisAttribute(){
       
    //guardamos el valor del atributo en una variable
        $pais = $this->attributes['pais'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $pais = str_replace('_', ' ', $pais);
        //convertimos la primera letra del valor en mayuscula
        $pais = ucwords($pais);
        //devolvemos el valor del attributo ya tratado
        return empty($pais) ? '--' : $pais;
    }
     

   //Mutator de atributo Nombre a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setNombreAttribute( $value = ""){
       
       //sacamos los espacios en el valor recibido
       $value = trim( $value );
       //reemplazamos los espacios en guiones del valor recibido
       $value = str_replace( ' ','_', $value);
       //convertimos el valor recibido a minusculas
       $value = strtolower( $value );
       //asignamos el valor al atributo del Modelo
       $this->attributes['nombre'] = $value;

   }
   //Mutator de atributo Localidad a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setLocalidadAttribute( $value = ""){
       
    //sacamos los espacios en el valor recibido
    $value = trim( $value );
    //reemplazamos los espacios en guiones del valor recibido
    $value = str_replace( ' ','_', $value);
    //convertimos el valor recibido a minusculas
    $value = strtolower( $value );
    //asignamos el valor al atributo del Modelo
    $this->attributes['localidad'] = $value;

    }
    //Mutator de atributo Provincia a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setProvinciaAttribute( $value = ""){
       
    //sacamos los espacios en el valor recibido
    $value = trim( $value );
    //reemplazamos los espacios en guiones del valor recibido
    $value = str_replace( ' ','_', $value);
    //convertimos el valor recibido a minusculas
    $value = strtolower( $value );
    //asignamos el valor al atributo del Modelo
    $this->attributes['provincia'] = $value;

    }
    //Mutator de atributo Pais a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setPaisAttribute( $value = ""){
       
    //sacamos los espacios en el valor recibido
    $value = trim( $value );
    //reemplazamos los espacios en guiones del valor recibido
    $value = str_replace( ' ','_', $value);
    //convertimos el valor recibido a minusculas
    $value = strtolower( $value );
    //asignamos el valor al atributo del Modelo
    $this->attributes['pais'] = $value;

}
   
}
