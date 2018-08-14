<?php

namespace App\Http\Controllers;

//Modelos a utilizar
use App\Carrera;
use App\Persona;
use App\Role;
use App\User;

//Clase Response para crear la respuesta especial
//con la cabecera de localizacion en el metodo Store()
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Metodo para mostrar todas las personas

        //tomamos el id del Rol Estudiante
        $rol = Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id;

        //filtramos los usuarios que tengan Roles y no el rol "Estudiante"
        $usuarios = User::whereHas('roles', function ($query) use ($rol) {
            
            return $query->where('id', '!=', $rol);

        })->with('persona')->orderBy('username')->paginate(10);

        return view('usuario.index', compact('usuarios'));
    }
}
