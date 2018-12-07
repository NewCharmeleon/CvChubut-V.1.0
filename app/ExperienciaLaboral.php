<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//agregado para el borrado logico
use SoftDeletes;

class ExperienciaLaboral extends Model
{
   //nombre de la Tabla a la cual referencia el Modelo

   protected $table = 'experiencias_laborales';

   //atributo para usar el SoftDelete
   protected $dates = ['deleted_at'];
   //atributos a llenar del Modelo

   protected $fillable = [
       'puesto',
       'descripcion_de_tareas',
       'fecha_ini',
       'fecha_fin',
       'empleador',
       'localidad',
       'provincia',
       'referencia',
       'rentado',
       'persona_id',
       'mostrar_cv'
   ];

   //establecemos las relaciones a otros Modelos
   public function persona()
   {
       return $this->belongsTo(Persona::class, 'persona__id');
   }

   //establecemos los Accesors y Mutators a utilizar para la estandarizacion de los datos en la BBDD
   //Accesor de atributo Puesto automatico cuando llamamos a $experiencialaboral->puesto;
   public function getPuestoAttribute(){
       
       //guardamos el valor del atributo en una variable
       $puesto = $this->attributes['puesto'];
       //reemplazamos los guiones por espacios para una mejor lectura del dato
       $puesto = str_replace('_', ' ', $puesto);
       //convertimos la primera letra del valor en mayuscula
       $puesto = ucfirst( $puesto);
       //devolvemos el valor del attributo ya tratado
       return $puesto;
   }
   //Accesor de atributo Descripcion de Tareas automatico cuando llamamos a $experiencialaboral->nombre;
   public function getDescripcionDeTareasAttribute(){
       
    //guardamos el valor del atributo en una variable
    $descripcion = $this->attributes['descripcion_de_tareas'];
    //reemplazamos los guiones por espacios para una mejor lectura del dato
    $descripcion = str_replace('_', ' ', $descripcion);
    //convertimos la primera letra del valor en mayuscula
    //devolvemos el valor del attributo ya tratado
    return ucfirst($descripcion);
    }
    
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
         $fecha_de_finalizacion = $this->attributes['fecha_fin'];
        
         if( !empty( $fecha_de_finalizacion ) ){
            $fecha_de_finalizacion = Carbon::parse($fecha_de_finalizacion);
            $fecha_de_finalizacion = $fecha_de_finalizacion->format('d-m-Y');
         }else{
            $fecha_de_finalizacion = null;
        }
              
        
        //devolvemos el valor del attributo ya tratado
        return $fecha_de_finalizacion;
    }
    //Accesor de atributo Empleador automatico cuando llamamos a $experiencialaboral->empleador;
   public function getEmpleadorAttribute(){
       
        //guardamos el valor del atributo en una variable
        $empleador = $this->attributes['empleador'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $empleador = str_replace('_', ' ', $empleador);
        //convertimos la primera letra del valor en mayuscula
        //devolvemos el valor del attributo ya tratado
        return ucwords($empleador);
    }
    //Accesor de atributo Provincia automatico cuando llamamos a $experiencialaboral->provincia;
   public function getProvinciaAttribute(){
       
        //guardamos el valor del atributo en una variable
        $provincia = $this->attributes['provincia'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $provincia = str_replace('_', ' ', $provincia);
        //convertimos la primera letra del valor en mayuscula
        //devolvemos el valor del attributo ya tratado
        return ucwords($provincia);
    }
    //Accesor de atributo Localidad automatico cuando llamamos a $experiencialaboral->localidad;
   public function getLocalidadAttribute(){
       
        //guardamos el valor del atributo en una variable
        $localidad = $this->attributes['localidad'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $localidad = str_replace('_', ' ', $localidad);
        //convertimos la primera letra del valor en mayuscula
        //devolvemos el valor del attributo ya tratado
        return ucwords($localidad);
    }
     //Accesor de atributo Localidad automatico cuando llamamos a $experiencialaboral->referencia;
   public function getReferenciaAttribute(){
       
        //guardamos el valor del atributo en una variable
        $referencia = $this->attributes['referencia'];
        //reemplazamos los guiones por espacios para una mejor lectura del dato
        $referencia = str_replace('_', ' ', $referencia);
        //convertimos la primera letra del valor en mayuscula
        //devolvemos el valor del attributo ya tratado
        return ucwords($referencia);
    }

    //Accesor de atributo Rentado automatico cuando llamamos a $experencialaboral->rentado;
    public function getRentadoShowAttribute(){
       
        //devolvemos el valor del attributo ya tratado
        return ( $this->attributes['rentado'] ) ? 'Si': 'No';
    } 
    //
    public function btn_mostrar(){

        $check = $this->mostrar_cv ? 'checked' : '';

        return "<input type='checkbox' ". $check . " class='mostrar_ocultar' data-size='small'/>";
    }

 
    //Query que se va a solicitar repetidas veces
    public function scopeMostrarExperienciasLaboralesUsuario ( $query, $persona ){
        return $query->where('mostrar_cv', true)->where('persona_id', $persona->id)->orderBy('fecha_ini')->get();
    }
    //Scopes de querys que se solicitan muchas veces
    function scopeExperienciasDelUsuario($query, $persona)
    {
        return $query
        ->orderBy('fecha_ini', 'desc')
        ->where('persona_id', $persona->id)
        ->paginate(10);
    }



   //Mutator de atributo Puesto a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setPuestoAttribute( $value = ""){
       
       //sacamos los espacios en el valor recibido
       $value = trim( $value );
       //reemplazamos los espacios en guiones del valor recibido
       $value = str_replace( ' ','_', $value);
       //convertimos el valor recibido a minusculas
       $value = strtolower( $value );
       //asignamos el valor al atributo del Modelo
       $this->attributes['puesto'] = $value;

   }
   //Mutator de atributo Empleador a utilizar automaticamente
   //cuando se usan los metodos create()-update()-save()
   public function setEmpleadorAttribute( $value = ""){
       
        //sacamos los espacios en el valor recibido
        $value = trim( $value );
        //reemplazamos los espacios en guiones del valor recibido
        $value = str_replace( ' ','_', $value);
        //convertimos el valor recibido a minusculas
        $value = strtolower( $value );
        //asignamos el valor al atributo del Modelo
        $this->attributes['empleador'] = $value;

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
    //Mutator de atributo Referencia a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setReferenciaAttribute( $value = ""){
       
        //sacamos los espacios en el valor recibido
        $value = trim( $value );
        //reemplazamos los espacios en guiones del valor recibido
        $value = str_replace( ' ','_', $value);
        //convertimos el valor recibido a minusculas
        $value = strtolower( $value );
        //asignamos el valor al atributo del Modelo
        $this->attributes['referencia'] = $value;
    
    }
    //Mutator de atributo Descripcion de Tareas a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setDescripcionDeTareasAttribute( $value = ""){
       
        //sacamos los espacios en el valor recibido
        $value = trim( $value );
        //reemplazamos los espacios en guiones del valor recibido
        $value = str_replace( ' ','_', $value);
        //convertimos el valor recibido a minusculas
        $value = strtolower( $value );
        //asignamos el valor al atributo del Modelo
        $this->attributes['descripcion_de_tareas'] = $value;
    
    }
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
        //Si es vacio el valor ponemos por defecto null
        if(empty($value)){
            $value = null;
        }
        //asignamos el valor formateado al atributo del Modelo
        $this->attributes['fecha_fin'] = $value;    
    }
    //Mutator de atributo Rentado a utilizar automaticamente
    //cuando se usan los metodos create()-update()-save()
    public function setRentadoAttribute( $value = false){
       
        //asignamos el valor al atributo del Modelo
        $this->attributes['rentado'] = boolval( $value );
    
    }
     
        

}
