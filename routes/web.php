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

Route::get('usuarios/index',"UserController@index_view")->name('usuarios.index');


Route::get('/form', ['as' => 'form', 'uses' => 'FormController@index']);
