<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Actividad extends Model
{
     //nombre de la Tabla a la cual referencia el Modelo

   protected $table = 'actividades';

   //atributos a llenar del Modelo

   protected $fillable = [
       'institucion_id',
       'persona_id',
       'nombre',
       'actividad_tipo_id',
       'ambito_actividad_id',
       'tipo_participacion_id',
       'modalidad_id',
       'fecha_ini',
       'fecha_fin',
       'duracion',
       'referente',
       'lugar'
       
   ];
   //atributos que no se devuelven en las consultas
  protected $hidden = ['created_at','updated_at'];
   //establecemos las relaciones a otros Modelos
   public function institucion()
   {
       return $this->belongsTo(Institucion::class, 'institucion_id');
   }
   
   public function persona()
   {
       return $this->belongsTo(Persona::class, 'persona_id');
   }
   
   public function actividadTipo()
   {
        return $this->belongsTo(ActividadTipo::class, 'actividad_tipo_id');
   }
   
   public function ambitoActividad()
   {
       return $this->belongsTo(AmbitoActividad::class, 'ambito_actividad_id');
   }
   
   public function participacionTipo()
   {
       return $this->belongsTo(TipoParticipacion::class, 'participacion_tipo_id');
   }
   
   public function modalidad()
   {
       return $this->belongsTo(Modalidad::class, 'modalidad_id');
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
   /*//Accesor de atributo Duracion automatico cuando llamamos a $experiencialaboral->nombre;
   public function getDuracionAttribute(){
       
    //guardamos el valor del atributo en una variable
    $duracion = $this->attributtes['duracion'];
    //reemplazamos los guiones por espacios para una mejor lectura del dato
    $duracion = str_replace('_', ' ', $duracion);
    //convertimos la primera letra del valor en mayuscula
    //devolvemos el valor del attributo ya tratado
    return ucfirst($duracion);
    }*/
    
    //Accesor de atributo Fecha_Ini en Show automatico cuando llamamos a $experiencialaboral->fecha_ini;
    public function getFechaIniShowAttribute(){
       
    //guardamos el valor del atributo en una variable
    $fecha_de_inicio = $this->attributes['fecha_ini'];
    
    if( !empty( $fecha_de_inicio ) ){
        $fecha_de_inicio = Carbon::parse($fecha_de_inicio);
        $fecha_de_inicio = $fecha_de_inicio->format('d-m-Y');
    }else{
        $fecha_de_inicio = "No posee fecha registrada";
    }
          
    
    //devolvemos el valor del attributo ya tratado
    return $fecha_de_inicio;
    }
    //Accesor de atributo Fecha_Ini en Form automatico cuando llamamos a $experiencialaboral->fecha_ini;
    public function getFechaIniFormAttribute(){
       
        //guardamos el valor del atributo en una variable
     $fecha_de_inicio = $this->attributes['fecha_ini'];
    
     if( !empty( $fecha_de_inicio ) ){
        $fecha_de_inicio = Carbon::parse($fecha_de_inicio);
        $fecha_de_inicio = $fecha_de_inicio->format('d-m-Y');
     }else{
        $fecha_de_inicio = null;
    }
          
    
    //devolvemos el valor del attributo ya tratado
    return $fecha_de_inicio;
    }

    //Accesor de atributo Fecha_Fin en Show automatico cuando llamamos a $experiencialaboral->fecha_fin;
    public function getFechaFinShowAttribute(){
       
        //guardamos el valor del atributo en una variable
        $fecha_de_finalizacion = $this->attributes['fecha_fin'];
        
        if( !empty( $fecha_de_finalizacion ) ){
            $fecha_de_finalizacion = Carbon::parse($fecha_de_finalizacion);
            $fecha_de_finalizacion = $fecha_de_finalizacion->format('d-m-Y');
        }else{
            $fecha_de_finalizacion = "Actualmente Trabajando";
        }
              
        
        //devolvemos el valor del attributo ya tratado
        return $fecha_de_finalizacion;
        }
        //Accesor de atributo Fecha_Fin en Form automatico cuando llamamos a $experiencialaboral->fechafin;
        public function getFechaFinFormAttribute(){
           
            //guardamos el valor del atributo en una variable
         $fecha_de_finalizacion = $this->attributes['fecha_ini'];
        
         if( !empty( $fecha_de_finalizacion ) ){
            $fecha_de_finalizacion = Carbon::parse($fecha_de_finalizacion);
            $fecha_de_finalizacion = $fecha_de_finalizacion->format('d-m-Y');
         }else{
            $fecha_de_finalizacion = null;
        }
              
        
        //devolvemos el valor del attributo ya tratado
        return $fecha_de_finalizacion;
    }
    //Accesor de atributo Referente automatico cuando llamamos a $experiencialaboral->empleador;
   public function getReferenteAttribute(){
       
    //guardamos el valor del atributo en una variable
    $referente = $this->attributes['referente'];
    //reemplazamos los guiones por espacios para una mejor lectura del dato
    $referente = str_replace('_', ' ', $referente);
    //convertimos la primera letra del valor en mayuscula
    //devolvemos el valor del attributo ya tratado
    return ucwords($referente);
    }
    //Accesor de atributo Lugar automatico cuando llamamos a $experiencialaboral->provincia;
   public function getLugarAttribute(){
       
    //guardamos el valor del atributo en una variable
    $lugar = $this->attributes['lugar'];
    //reemplazamos los guiones por espacios para una mejor lectura del dato
    $lugar = str_replace('_', ' ', $lugar);
    //convertimos la primera letra del valor en mayuscula
    //devolvemos el valor del attributo ya tratado
    return ucwords($lugar);
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
   /*
   //Mutator de atributo Duracion a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setEmpleadorAttribute( $value = ""){
       
    //sacamos los espacios en el valor recibido
    $value = trim( $value );
    //reemplazamos los espacios en guiones del valor recibido
    $value = str_replace( ' ','_', $value);
    //convertimos el valor recibido a minusculas
    $value = strtolower( $value );
    //asignamos el valor al atributo del Modelo
    $this->attributes['puesto'] = $value;

    }
    */
    
    
    //Mutator de atributo Fecha de Inicio a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setFechaIniAttribute($value = '01-01-1910'){
       
        //modificamos el formato del valor del atributo en una variable
        $value = Carbon::parse($value);
        $value = $value->format('Y-m-d');

        //asignamos el valor formateado al atributo del Modelo
        $this->attributes['fecha_ini'] = $value;
    }
    //Mutator de atributo Fecha de Fin a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setFechaFinAttribute($value = null){
       
        //verificacion del tipo de valor que recibimos para su modificacion
        if( ! is_null( $value ) && ! empty($value) ){

            //modificamos el formato del valor del atributo en una variable
            $value = Carbon::parse($value);
            $value = $value->format('Y-m-d');
        }
        //asignamos el valor formateado al atributo del Modelo
        $this->attributes['fecha_fin'] = $value;    
    }
    //Mutator de atributo Referente a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
    public function setReferenteAttribute( $value = ""){
       
        //sacamos los espacios en el valor recibido
        $value = trim( $value );
        //reemplazamos los espacios en guiones del valor recibido
        $value = str_replace( ' ','_', $value);
        //convertimos el valor recibido a minusculas
        $value = strtolower( $value );
        //asignamos el valor al atributo del Modelo
        $this->attributes['referente'] = $value;
 
    }
    //Mutator de atributo Lugar a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
    public function setLugarAttribute( $value = ""){
       
        //sacamos los espacios en el valor recibido
        $value = trim( $value );
        //reemplazamos los espacios en guiones del valor recibido
        $value = str_replace( ' ','_', $value);
        //convertimos el valor recibido a minusculas
        $value = strtolower( $value );
        //asignamos el valor al atributo del Modelo
        $this->attributes['lugar'] = $value;
 
    }
}
