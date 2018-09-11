@extends('layouts.app')

@section ('title', 'Usuario : ver')
  
@section ('content')

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $user->persona->nombre_apellido }} <small> Ver </small> </h3>
        </div>
        <div class="panel-body")
                <form action="" class="form-horizontal">
                    @include('usuario.partials.show_user')
                </form>
        </div>        
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Volver</a>  
            <a class="btn btn-warning" href="{{ route('usuarios.edit', $user->id) }}"> Editar</a>
        </div>
    </div>
       
@endsection  
