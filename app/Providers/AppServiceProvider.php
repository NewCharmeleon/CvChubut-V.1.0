<?php

namespace App\Providers;

//Modelos que vamos a necesitar para las Validaciones
//y Vistas globales
use App\Persona;
use App\Actividad;
use App\Modalidad;

use Carbon\Carbon;
//use App\Carbon\Carbon;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   //Esto no lo utilizaremos mas debido a los cambios en el Proyecto
        \View::composer('actividad.partials.content', function ($view){

            $actividades = Actividad::ActividadesDelUsuario();

            return $view->with(['actividades' => $actividades->paginate(2) ]);

        });
        // Call to Entrust::getRole
        /*  \Blade::directive('getRole', function($expression) {
              return "<?php if (\\Entrust::getRole({$expression})) : ?>";
          });

          \Blade::directive('endgetRole', function($expression) {
              return "<?php endif; // Entrust::getRole ?>";
          });
        */  

        //Extendemos los validadores especiales creados para la aplicacion
        //Validacion especial para verificar que contenga solo letras el valor
        Validator::extend('solo_letras', function ($attribute, $value, $parameters, $validator )
        {

            //tomamos la longitud del valor recibido
            $longitud_original = strlen($value);

            //reemplazamos los espacios por nada
            $value = str_replace(' ', '', $value);
            //reemplazamos los numeros por nada
            $value = preg_replace('/[0-9]+/', '', $value);
            //reemplazamos el signo $ por nada
            $value = str_replace('$', '', $value);
            //reemplazamos el signo + por nada
            $value = str_replace('+', '', $value);
            //reemplazamos el signo * por nada
            $value = str_replace('*', '', $value);
            //reemplazamos el signo & por nada
            $value = str_replace('&', '', $value);
            //reeemplazamos el signo < por nada
            $value = str_replace('<', '', $value);
            //reemplazamos el signo > por nada
            $value = str_replace('>', '', $value);
            //reemplazamos el signo % por nada
            $value = str_replace('%', '', $value);

            //devolvemos la longitud del valor
            return $longitud_original = strlen($value);
        });

        //Validacion especial para determinar que un DNI recibido sea unico
        Validator::extend('dni_unique', function ($attribute, $value, $parameters, $validator)
        {

            //Sacamos los espacios del principio y del final
            $value = trim($value);
            //reemplazamos el punto . por espacio
            $value = str_replace('.', '', $value);
            //reemplazamos el espacio por nada
            $value = str_replace(' ', '', $value);
            //reemplazamos el signo - por nada
            $value = str_replace('-', '', $value);
            //reemplazamos letras por nada
            $value = preg_replace('/[A-Za-z]+/', '', $value);

            //capturamos en una variable el valor del parametro Id recibido
            $id = $parameters[0];
            
            //si es Edit verificamos que el Id no sea Nulo 
            if( ! is_null($id)  ){

                //verificamos si existe una Persona con el mismo DNI
                $persona =  Persona::where('id', $id)
                                    ->where('dni', 'LIKE', $value)->get()->first();
                
                //si existe la persona devolvemos True
                if (count( $persona) !=0 ){
                    return true;
                }
                                
            }

            //verificamos si existe el DNI cargado en otras personas
            $persona_ya_registrada = Persona::where('dni', 'LIKE', $value )->get()->first();

            if (count($persona_ya_registrada) != 0){
                return false;
            }
            return true;

        });
        //Validacion especial para verificar si Es mayor de Edad
        Validator::extend('mayor_de_edad', function ($attribute, $value, $parameters, $validator)
        {
            //parseamos la fecha para realizar despues la evaluacion
            $value = Carbon::parse($value);
            //tomamos la fecha actual
            $fecha_actual = Carbon::now();

            //realizamos la comparacion tomada en años
            //debiendo Ser Mayor a 17 años
            return $fecha_actual->diffInYears( $value ) >=17;

        });
        //Validacion especial para verificar si la Nacionalidad Existe
        Validator::extend('nacionalidad_exist', function($attribute, $value, $parameters, $validator)
        {
            //verificamos si el Valor es Vacio o Nulo
            if ( empty($value) || is_null($value) ){
                return true;
            }
            //verificamos si existe en el array de Nacionalidades
            return in_array( $value, Persona::nacionalidades( ));
        });
        //Validacion especial para verificar si un Telefono es valido
        Validator::extend('telefono_valid', function($attribute, $value, $parameters, $validator )
        {
            //Eliminamos del Valor todo lo que no sea Digito
            $value = preg_replace('/\D+/', '', $value);
            //verificamos que pase el Regex de Validacion
            return preg_match(
                '/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D',
                $value
            );
        });
        //Validacion especial para verificar si el Mail es Valido y de la UDC
        Validator::extend('email_udc_valid', function($attribute, $value, $parameters, $validator){

            //Verificamos que la terminacion del Email sea del tipo Udc
            return strpos( $value, '@udc.edu.ar' ) != false;
        });
        //Reemplazamos el atributo before_or_equal con un mensaje nuevo
        Validator::replacer('before_or_equal', function($message, $attribute, $rule, $parameters){

            //devolvemos los parametros del nuevo mensaje
            return str_replace(':date', $parameters[0], $message);
        });

    
    
    
    
    
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
