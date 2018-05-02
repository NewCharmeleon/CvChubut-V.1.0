<?php

namespace App\Http\Controllers;
//Modelo que necesitamos
use App\Oferente;
use App\Role;
//Clase Response para crear la respuesta especial con la cabecera de
//localizacion en el metodo Store()
use View;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class OferenteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function __construct(){
     $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
   }
  public function index()
  {


    /*

    $view = View::make('welcome', [
            'data' => 'Hello World !'
        ]);

        $html = $view->render();
        // or cast the content into a string
        // $html = (string) $view;*/
        //Se Mostrara todos los oferentes
    //return "Mostrando todos los oferentes";
  /****  $oferentes=Cache::remember('cacheoferentes',15/60, function(){
      return Oferente::simplePaginate(10);
    });
    return response()->json(['status'=>'ok',
                              'siguiente'=>$oferentes->nextPageUrl(),
                              'anterior'=>$oferentes->previousPageUrl(),
                              'data'=>$oferentes->items()],200);*/
      $rol='oferente';
      $oferente=Role::with('users')->where('roles.name',$rol)->paginate(15);
      if ($oferente->isEmpty()){
          return
            response()->json(['errors'=>array(['code'=>404, 'message'=>'No Hay Usuarios con rol Oferente'.$rol])], 404);
      }
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return response()->json(['status'=>'ok', 'data'=>$oferente], 200);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

/*para cargar el rol admin  public function store(Request $request, $persona_id)
  {
    //Guardamos una Persona como un nuevo Oferente
    //Comprobamos que recibimos todos los parametros
    if (!$request->input('persona_id') || !$request->input('actividad_id'))
    {
      //Se devuelve un array "errors" con los errores encontrados y cabecera
      //HTTP 422 Unprocessable Entity - Utilizada para errores de validacion
      return
        response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para el
        proceso de alta.'])],422);
      //Insertamos una fila en Oferente con "create" pasandole los datos recibidos.
      $nuevoOferente=Oferente::create($request-all());

      //Devolvemos el codigo HTTP 201 created
      $response =
          Response::make(json_encode(['data'=>$nuevoOferente]),
          201)->header('Location','http://www.localhost/oferentes/'.$nuevoOferente->id)->header('Content-Type',
          'application/json');
            return $response;
    }
  }*/

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //Se Mostrara un oferente determinado
    //return "Mostrando oferente con id: $id";
    $oferente=Oferente::find($id);

    //En caso de que no Exista tal usuario devolvemos un ErrorException
    if (!$oferente){
      //Es recomendable devolver un array "errors" con los errores encontrados
      //y su respectiva cabecera HTTP 404--El mensaje puede ser personalizado
      return
      response()->json(['errors'=>array(['code'=>404, 'message'=>'No se encuentra ningun Oferente con ese id.'])], 404);
    }
    return
    response()->json(['status'=>'ok', 'data'=>$oferente], 200);
    response()->json(['body' => View::make('oferente.$id')->render()]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

}
