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
  Route::resource('actividades','ActividadController',['only'=>['index', 'show']]);
  Route::resource('actividadesEspecifica','ActividadEspecificaController',['only'=>['index', 'show']]);
  Route::resource('actividadesTipo','ActividadTipoController',['only'=>['index', 'show']]);
  Route::resource('carreras','CarreraController',['only'=>['index', 'show']]);
  Route::resource('estudiantes','EstudianteController',['only'=>['index', 'show']]);
  Route::resource('legajos','LegajoController',['only'=>['index', 'show']]);
  Route::resource('oferentes','OferenteController',['only'=>['index', 'show']]);
  Route::resource('personas','PersonaController',['only'=>['index', 'show']]);
  Route::resource('usuarios','UserController',['only'=>['index', 'show']]);
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
