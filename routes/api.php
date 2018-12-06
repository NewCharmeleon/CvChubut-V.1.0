<?php

use Illuminate\Http\Request;
use App\Role;
use App\User;
//use Datatables;
//use App\Carrera;
//use Yajra\Datatables\Facades\Datatables;
//use Yajra\Datatables\Datatables;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Ruta que maneja las Autorizaciones de Usuarios
/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::get('actividadesTipos', function (){
  
  $model = App\ActividadTipo::query();
  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    ->addColumn('btn', function ($actividad_tipo) {
      return view( 'actividadTipo.partials.acciones', compact('actividad_tipo'));
      })
    //->removeColumn(['btn'])
    ->make(true);
});

Route::get('ambitosActividades', function (){
  
  $model = App\AmbitoActividad::query();
  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    ->addColumn('btn', function ($ambito_actividad) {
      return view( 'ambito_actividad.partials.acciones', compact('ambito_actividad'));
      })
    //->removeColumn(['btn'])
    ->make(true);
});

Route::get('carreras', function (){
  
  $model = App\Carrera::query();
  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    ->addColumn('btn', function ($carrera) {
      return view( 'carrera.partials.acciones', compact('carrera'));
      })
    //->removeColumn(['btn'])
    ->make(true);
});

Route::get('estudiantes', function (){
  //Buscamos el Rol Estudiante
  $rol = Role::where('name', 'LIKE', 'Estudiante')->get()->first();
  //Buscamos los Usuarios con Rol Estudiante
  $estudiante = User::whereHas('roles', function ($query) use ($rol){
    return $query->where('id', $rol->id);
})->with('persona.carrera');

  return Datatables::of($estudiante)
    /*->editColumn('persona.carrera.nombre', function($estudiante){
       if('persona.carrera.nombre' == null)
       { 
         return "Sin Datos";
       }else
       { return ($estudiante->persona->carrera->nombre); 
      } })
      ->editColumn('persona.carrera.cantidad_materias', function($estudiante){
        if('persona.carrera.cantidad_materias' == null)
        { 
          return "Sin Datos";
        }else
        { return ($estudiante->persona->carrera->cantidad_materias); 
       } })
       ->editColumn('persona.carrera.materias_aprobadas', function($estudiante){
        if('persona.carrera.materias_aprobadas' == null)
        { 
          return "Sin Datos";
        }else
        { return ($estudiante->persona->carrera->nombre); 
       } })*/
      ->addColumn('btn', function ($estudiante) {
      return view( 'estudiante.partials.acciones', compact('estudiante'));
      })
   
    ->make(true);
    
});


Route::get('instituciones', function (){
  
  $model = App\Institucion::query();
  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    ->addColumn('btn', function ($institucion) {
      return view( 'institucion.partials.acciones', compact('institucion'));
      })
    //->removeColumn(['btn'])
    ->make(true);
});

Route::get('modalidades', function (){
  
  $model = App\Modalidad::query();
  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    ->addColumn('btn', function ($modalidad) {
      return view( 'modalidad.partials.acciones', compact('modalidad'));
      })
    //->removeColumn(['btn'])
    ->make(true);
});

Route::get('tiposParticipaciones', function (){
  
  $model = App\TipoParticipacion::query();
  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    ->addColumn('btn', function ($tipo_participacion) {
      return view( 'tipo_participacion.partials.acciones', compact('tipo_participacion'));
      })
    //->removeColumn(['btn'])
    ->make(true);
});

Route::get('usuarios', function (){
  
  //$model = App\User::query();
  //tomamos el id del Rol Estudiante
  $rol = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;
  //$roles = Role::where('name', '!=', 'Estudiante')->orderBy('display_name')->get();
  //filtramos los usuarios que tengan Roles y no el rol "Estudiante"
  $model = User::whereHas('roles', function ($query) use ($rol) {
      
      return $query->where('id', '!=', $rol);

  })->with('persona', 'roles');
  //->with('roles');
  

  return Datatables::of($model)
    //->addColumn('btn', @include('carrera.partials.acciones'))
    
    ->addColumn('Nombre', function ($usuario) {
      return $usuario->persona->nombre_apellido;
      })
    ->addColumn('Roles', function ($usuario) {
      return $usuario->roles->first()->display_name;
      })
      ->addColumn('btn', function ($usuario) {
      return view( 'usuario.partials.acciones', compact('usuario'));
      })
      
       
    //->removeColumn(['id'])
    ->make(true);
});




//versionado del Api
/*Route::group(array('prefix'=>'/v1.0'),function(){
  Route::get('/form', ['as' => 'form', 'uses' => 'FormController@index']);
    //Rutas que redirigen al api segun los parametros del URI que se invoque...xD
  //Actividad
  Route::resource('actividades','ActividadController',['only'=>['index', 'show']]);
  //Actividades Especificas
  Route::resource('actividadesEspecifica','ActividadEspecificaController',['only'=>['index', 'show']]);
  //Actividades Tipo
  Route::resource('actividadesTipo','ActividadTipoController',['only'=>['index', 'show']]);
  //Carreras
  Route::resource('carreras','CarreraController',['only'=>['index', 'show']]);
  //Estudiantes
  Route::resource('estudiantes','EstudianteController',['only'=>['index', 'show']]);
  //Legajos
  Route::resource('legajos','LegajoController',['only'=>['index', 'show']]);
  //Oferentes
  Route::resource('oferentes','OferenteController',['only'=>['index', 'show']]);
  //Personas
  Route::resource('personas','PersonaController',['only'=>['index', 'show']]);
  //Usuarios
  Route::resource('usuarios','UserController',['only'=>['index', 'show']]);
  //Referentes
  Route::resource('referentes','ReferenteController',['only'=>['index', 'show']]);

  //Rutas que redirigen a recursos anidados
  Route::resource('estudiantes.actividadEspecifica','EstudianteActEspController',
  ['except'=>['edit', 'show', 'create']]);

  Route::resource('oferentes.actividadEspecifica','OferenteActEspController');

  Route::resource('referentes.actividadEspecifica','ReferenteActEspController');

  Route::resource('usuarios.role.personas','UserPersonaController');

  //Nuevas rutas anidadas
  Route::resource('actividadesTipo.actividades.actividadesEspecifica','ActividadTipoActividadEspecificaController',
  ['except'=>['show']]);
  }
);
*/