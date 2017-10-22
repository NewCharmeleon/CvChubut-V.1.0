<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Modelo que necesitamos
use App\User;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Response;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   //Configuramos en el constructor del controlador la autenticacion
   //usando el Middleware auth.basic pero solamante a store, update y destroy.

  public function __construct(){
    $this->middleware('auth.basic',['only'=>['show','create','store','update','destroy']]);
  }

  public function index()
  {
    //Se Mostrara todos los usuarios

    //return "Mostrando todos los usuarios";
    //Recomendable devolver un objeto con propiedad "data" con el array de
    //resultados dentro de esa propiedad.
    $users=Cache::remember('cacheusers',15/60, function(){
      return User::simplePaginate(5);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$users->nextPageUrl(),'anterior'=>$users->previousPageUrl(),'data'=>$users->items()],200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //Se Mostrara un formulario para la carga de usuarios
    //return "peticion post recibida.";
    //Comprobacion de llegada completa de los datos
    /*if (!$request->input('username') || !$request->input('email') ||
     !$request->input('password'));
    {
        //Devolvemos un array llamado "errors" con los errores encontrados y
        //cabecera HTTP 422 Unprocessable Entity -utilizada para errores de
        //validacion
        return response()->json(['errors'=>array(['code'=>422, 'message'=>'Faltan
        datos necesarios para el proceso de alta.'])], 422);
    }
        //Insertamos una fila en User con el metodo create pasando todos legajos
        //los datos recibidos

        $user=User::create($request->all());
        //Devolvemos el codigo HTTP 201 Created
        $response=
        Response::make(json_encode(['data'=>$user]), 201)->header('Location',
        'http://localhost/users/'.$user->id)->header('Content-Type', 'application/json');
        return $response;
        //return "Mostrando formulario para cargar un usuario";
  */}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  //Pasamos los parametros al metodo store todas las variables recibidas
  //del tipo Request utilizando inyeccion de dependencias
  public function store(Request $request)
  {
    //return "peticion post recibida.";
    //Comprobacion de llegada completa de los datos
    if (!$request->input('username') || !$request->input('email') ||
     !$request->input('password'));
    {
        //Devolvemos un array llamado "errors" con los errores encontrados y
        //cabecera HTTP 422 Unprocessable Entity -utilizada para errores de
        //validacion
        return response()->json(['errors'=>array(['code'=>422, 'message'=>'Faltan
        datos necesarios para el proceso de alta.'])], 422);

        //Insertamos una fila en User con el metodo create pasando todos legajos
        //los datos recibidos

        $nuevoUser=User::create($request->all());

    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //Se Mostrara un usuario determinado
    //return "Mostrando usuario con id: $id";
    //Recomendable buscar un Usuario por id
    $user=User::find($id);

    //En caso de que no Exista tal usuario devolvemos un ErrorException
    if (!$user){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra
      ningun Usuario con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$user], 200);

  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //Se mostrara un formulario para editar un usuario determinado
    return "Mostrando formulario para editar usuario con id: $id";
  }
  /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
