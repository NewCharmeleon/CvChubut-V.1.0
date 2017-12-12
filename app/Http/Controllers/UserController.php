<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Modelo que necesitamos
use App\User;
use App\Role;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use Response;
use Illuminate\Support\Facades\Cache;
//use View;

class UserController extends Controller
{
  protected $request;

  public function index_view()
  {
    $usuarios = User::with('roles')->get();
    $vista = view('usuario.index', compact('usuarios'));

    return response()->json( $vista->render() );

  }




  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   //Configuramos en el constructor del controlador la autenticacion
   //usando el Middleware auth.basic pero solamante a store, update y destroy.
   //para que solicite autorizacion para efectuar el metodo
  public function __construct(){
    $this->middleware('auth.basic',['only'=>['']]);
  }

  public function index()
  {
    //Se Mostrara todos los usuarios

    //return "Mostrando todos los usuarios";
    //Recomendable devolver un objeto con propiedad "data" con el array de
    //resultados dentro de esa propiedad.
    $users=Cache::remember('cacheusers',15/60, function(){
      //$roles = Role::pluck('id','display_name');
      //Auth::user()->load('roles');
      //$plucked = $collection->pluck('name', 'product_id');

      return User::with('roles')->simplePaginate(10);
      //return User::with('roles',$roles)->simplePaginate(10);
    });
    return response()->json(['status'=>'ok', 'siguiente'=>$users->nextPageUrl(),'anterior'=>$users->previousPageUrl(),'data'=>$users->items()],200);
//$user = User::find(1);

//obteniendo los menus asociados al User
/*foreach ($user->role as $role) {
//obteniendo los datos de un rol específico
echo $role->id;
echo $role->name;
//obteniendo datos de la tabla pivot por permiso
echo $role->pivot->permision_id;
echo $role->pivot->id;*/



//obteniendo los permisos asociados al User
/*foreach ($user->permission as $permission) {
//obteniendo los datos de un permiso específico
echo $permission->display_name;
//obteniendo datos de la tabla pivot por permiso
echo $permission->pivot->role_id;
echo $permission->pivot->id;*/
}


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  /*para usuario persona va esooo
  public function store(Request $request)
  {
    //return "peticion post recibida.";
    //Comprobacion de llegada completa de los datos
    if (!$request->input('username') || !$request->input('email') ||
     !$request->input('password'));*/
/*
    $reglas = [
                'username' => 'required',
                'email' => 'required|email|unique:users',
                //'password' => 'required|min:6'
    ];
    $this->validate($request, $reglas);

    $campos = $request->all();
    $campos['password'] = bcrypt(passwordDefault());

    $nuevoUsuario=User::create($campos);
    return response()->json(['data'=>$nuevoUsuario],201);
        //Devolvemos un array llamado "errors" con los errores encontrados y
        //cabecera HTTP 422 Unprocessable Entity -utilizada para errores de
        //validacion
    //return response()->json(['errors'=>array(['code'=>422, 'message'=>'Faltan datos necesarios para el proceso de alta.'])], 422);

        //Insertamos una fila en User con el metodo create pasando todos legajos
        //los datos recibidos

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
//estooo tambieeennnn
  public function show($id)
  {
    //Se Mostrara un usuario determinado
    //return "Mostrando usuario con id: $id";
    //Recomendable buscar un Usuario por id
    $usuarios=User::with('roles')->find($id);
    //$plucked = $usuarios->pluck('id','username','display_name');
    //$plucked->all();

    //En caso de que no Exista tal usuario devolvemos un ErrorException
    if (!$usuarios){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ningun Usuario con id: '.$id.'.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$usuarios], 200);

  }

  /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  /*kladsjfkljjfadks
  public function update(Request $request, $id)
  {
      $user = User::findOrFail($id);
      $reglas = [
                  'email' => 'email|unique:users,email,' . $user->id,
                  'password' => 'required|min:6'
      ];
      $this->validate($request, $reglas);

      //if ($request->has('username')){
      //  $user->username = $request->name;
      //}
      if ($request->has('email') && $user->email != $request->email){
        $user->email = $request->email;
      }
      if($request->has('password') && $user->password != $request->password){
        $user->password = bcrypt($request->password);
      }

      if(!$user->isDirty()){
        return response()->json(['error'=>'Se debe ingresar al menos un valor diferente
          para actualizar al Usuario','code'=> 422],422);
      }
      $user->save();
      return response()->json(['data'=>$user],200);
  }*/

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  /*pofiopigpipof
  public function destroy($id)
  {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json(['status'=>'ok','data'=>$user],200);

  }*/
}
