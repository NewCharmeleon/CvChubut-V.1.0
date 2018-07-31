<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //nombre de la Tabla a la cual referencia el Modelo

    protected $table = 'carreras';

    //atributos a llenar del Modelo

    protected $fillable = [
        'nombre',
        'cantidad_materias'
    ];

    //establecemos las relaciones a otros Modelos
    public function persona()
    {
        return $this->hasMany(Persona::class, 'carrera_id');
    }

    //establecemos los Accesors y Mutators a utilizar para la estandarizacion de los datos en la BBDD
    //Accesor de atributo Nombre automatico cuando llamamos a $carrera->nombre;
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

    //Mutator de atributo Nombre a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setNombreAttribute( $nombre = ""){
        
        //reemplazamos los espacios en guiones del valor recibido
        $nombre = str_replace( ' ','_', $nombre);
        //convertimos el valor recibido a minusculas
        $nombre = strtolower( $nombre );
        //asignamos el valor al atributo del Modelo
        $this->attributes['nombre'] = $nombre;

    }



}
