<?php

use Illuminate\Http\Request;

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
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
//versionado del Api
Route::group(array('prefix'=>'/v1.0'),function(){
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
  Route::resource('usuarios','UserController',['except'=>['create', 'edit']]);
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
