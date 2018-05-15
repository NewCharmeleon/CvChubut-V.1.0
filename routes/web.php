<?php
use App\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', 'HomeController@index');
//Rutas que todas vuelven al Home...SPAxD
/*Route::any('{all}', function () {
     return view('home');
})->where(['all' => '.*']);*/

//Route::get('usuarios/index',"UserController@index_view")->name('usuarios.index');
//versionado del Api
Route::group(array('prefix'=>'/v1.0'),function(){
  Route::get('/form', ['as' => 'form', 'uses' => 'FormController@index']);
    //Rutas que redirigen al api segun los parametros del URI que se invoque...xD
  //Usuarios
  Route::resource('usuarios','UserController',['only'=>['index', 'show']]);
  //de prueba Route::get('users', ['uses' => 'UsersController@index', 'as' => 'entrust-gui::users.index']);
  //Actividad
  Route::resource('actividades','ActividadController',['only'=>['index', 'show']]);
  //Actividades Especificas
  Route::resource('actividadesEspecifica','ActividadEspecificaController');
  //Actividades Tipo
  Route::resource('actividadesTipo','ActividadTipoController',['only'=>['index', 'show']]);
  /*//Carreras
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
 */
});

Route::get('/form', ['as' => 'form', 'uses' => 'FormController@index']);
