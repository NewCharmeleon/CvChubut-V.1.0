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

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function(){
  $role = App\Role::with('usuarios')->get();//firts();
  $roles = $role->roles()->first();
  $pivot = $roles->pivot;
  return $pivot->usuarios;
});
Auth::routes();

Route::get('/home', 'HomeController@index');
//Rutas que todas vuelven al Home...SPAxD
Route::any('{all}', function () {
     return view('home');
})->where(['all' => '.*']);
