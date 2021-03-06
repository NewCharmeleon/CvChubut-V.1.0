<?php


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
//dd("hola0");
/*Route::any('/data', function (){
  dd("hola");
  return Datatables::eloquent(App\Carrera::query())->make(true);
  //return datatables()->eloquent(Carrera::query())->toJson();
  //return datatables(User::all())->toJson();
})->name('carreras.data');*/
//Route::any('/data', 'DatatablesController@anyData')->name('carreras.data');
//Rutas que todas vuelven al Home...SPAxD
/*Route::any('{all}', function () {
     return view('home');
})->where(['all' => '.*']);*/

//Grupo de rutas para todos los roles filtrada por middleware
Route::group(['middleware' => ['role:Administrador|Secretaria|Estudiante']], function (){
  Route::resource('usuarios', 'UsuarioController', ['only' => ['update']]);
  Route::get('perfil', 'UsuarioController@perfil')->name('perfil');
  Route::get('perfil/edit', 'UsuarioController@perfil_edit')->name('perfil.edit');
  
});

//Rutas para el grupo Administrador filtrado por middleware
Route::group(['middleware' => ['role:Administrador']], function (){
  //Rutas para el acceso a los Metodos del Controlador de Usuarios
  //para el manejo del Crud exceptuando el Metodo update que es propio del mismo.
 
  Route::resource('usuarios', 'UsuarioController', ['except'=> ['update']]);
  Route::get('actividades/ver/todos', 'ActividadController@index_show')->name('actividades.index.show');
  Route::get('experiencias/laborales/ver/todos', 'ExperienciaLaboralController@index_show')->name('experiencias.laborales.index.show');
  });

//Rutas para el grupo Administrador y Secretaria filtradas por middleware
Route::group(['middleware' => ['role:Administrador|Secretaria']], function (){
  

//Rutas especiales para importar o exportar Excel o Csv
Route::get('/exportExcel', 'EstudianteController@exportExcel');
Route::get('/importExcel', 'EstudianteController@importExcel');
Route::get('/exportCsv', 'EstudianteController@exportExcel');
Route::get('/importCsv', 'EstudianteController@importExcel');
Route::get('/bladeToExcel', 'EstudianteController@bladeToExcel');


  //Estudiantes
  Route::get('estudiantes/agregar', 'EstudianteController@agregar_estudiantes_show')->name('agregar.estudiantes.show');
  Route::post('estudiantes/agregar', 'EstudianteController@agregar_estudiantes_store')->name('agregar.estudiantes.store');
  
  ///Estudiante Resources
  Route::resource('estudiantes', 'EstudianteController', ['except' => ['destroy']]);
  
  //Carreras
  Route::resource('carreras', 'CarreraController', ['except' => ['destroy']]);

  //Actividades Tipo
  Route::resource('actividades/tipos', 'ActividadTipoController', ['except' => ['destroy'],
    'names' => ['index' => 'actividades.tipos.index',
                'create' => 'actividades.tipos.create', 
                'edit' => 'actividades.tipos.edit', 
                'store' => 'actividades.tipos.store',
                'update' => 'actividades.tipos.update',
                'show' => 'actividades.tipos.show']
                ]
  );

  //Modalidades
  Route::resource('modalidades', 'ModalidadController', ['except' => ['destroy']]);

  //Ambitos de Actividades
  Route::resource('ambitos/actividades', 'AmbitoActividadController', ['except' => ['destroy'],
    'names' => ['index' => 'ambitos.actividades.index',
                'create' => 'ambitos.actividades.create', 
                'edit' => 'ambitos.actividades.edit', 
                'store' => 'ambitos.actividades.store',
                'update' => 'ambitos.actividades.update',
                'show' => 'ambitos.actividades.show']
                ]
  );

  //Tipos de Participacion
  Route::resource('tipos/participaciones', 'TipoParticipacionController', ['except' => ['destroy'],
    'names' => ['index' => 'tipos.participaciones.index',
                'create' => 'tipos.participaciones.create', 
                'edit' => 'tipos.participaciones.edit', 
                'store' => 'tipos.participaciones.store',
                'update' => 'tipos.participaciones.update',
                'show' => 'tipos.participaciones.show']
                ]
  );

  //Instituciones
  Route::resource('instituciones', 'InstitucionController');

});

//Rutas para el Rol Estudiante
Route::group(['middleware' => ['role:Estudiante']], function (){
  
  //Ruta para obtener el Curriculum en PDF
  Route::get('curriculum/pdf','ActividadController@generar_pdf')->name('curriculum.pdf');
 

    
    Route::post('experiencias/laborales/{id}/mostrar/cv', 'ExperienciaLaboralController@mostrar_cv')->name('experiencias.laborales.mostrar.cv');
    Route::post('experiencias/laborales/{id}/ocultar/cv', 'ExperienciaLaboralController@ocultar_cv')->name('experiencias.laborales.ocultar.cv');
    
    //Rutas para mostrar o no mostrar las actividades realizadas por el Estudiante
    Route::post('actividades/{id}/mostrar/cv', 'ActividadController@mostrar_cv')->name('actividades.mostrar.cv');
    Route::post('actividades/{id}/ocultar/cv', 'ActividadController@ocultar_cv')->name('actividades.ocultar.cv');
  
  //Ruta para ver la propia Carrera
  
  //Rutas para mostrar o no mostrar las experiencias laborales en el Cv
  Route::get('carrera/perfil', 'CarreraController@carrera_perfil')->name('carrera.perfil');
  Route::get('carrera/perfil/edit', 'CarreraController@carrera_perfil_edit')->name('carrera.perfil.edit');
  //Ruta para Agregar Materias Aprobadas para los Estudiantes
  
  //Route::get('estudiante/{id}/update/materias', 'EstudianteController@update_materias')->name('update.materias');
  Route::post('estudiante/materias/{id}/edit', 'EstudianteController@update_materias')->name('update.materias');
  
   /*//Rutas de Experiencias Laborales del Estudiante
   Route::resource('estudiantes', 'CarreraController',
   [
     'names' => [
       
       'edit'=> 'estudiantes.edit',
       'store'=> 'estudiantes.store',
       'update'=> 'estudiantes.update',
       
     ],
   ]); */

  
  //Rutas de Actividades del Estudiante
  Route::resource('actividades', 'ActividadController');

  
 //Ruta para mostrar las actividades del Estudiante
  //actividades
  Route::resource('actividades', 'ActividadController');
  //Rutas de Experiencias Laborales del Estudiante
  Route::resource('experiencias/laborales', 'ExperienciaLaboralController',
    [
      'names' => [
        'index'=> 'experiencias.laborales.index',
        'create'=> 'experiencias.laborales.create',
        'edit'=> 'experiencias.laborales.edit',
        'store'=> 'experiencias.laborales.store',
        'update'=> 'experiencias.laborales.update',
        'show'=> 'experiencias.laborales.show',
        'destroy'=> 'experiencias.laborales.destroy',
      ],
    ]);    
});



//Route::get('usuarios/index',"UserController@index_view")->name('usuarios.index');
//versionado del Api
/*Route::group(array('prefix'=>'/v1.0'),function(){
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
  Route::resource('actividadesTipo','ActividadTipoController');
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
 
});*/

/*Route::get('/form', ['as' => 'form', 'uses' => 'FormController@index']);
*/