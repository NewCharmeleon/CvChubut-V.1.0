@extends('layouts.appAce')

@section ('title', 'Usuario : editar')
  
@section('content')
 <form action="{{  route('usuarios.update', $user->id )      }}" method="POST" lang="es" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $user->persona->nombre_apellido }} <small>  editar  </small> </h3>
        </div>
        <div class="panel-body">
           
                <input type="hidden" name="_method" value="put">             
                @include('usuario.partials.form_user')
           
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Volver</a>
            <button type="submit" class="btn btn-success"> Guardar </button>
            
        </div>
    </div>    
 </form>
@endsection
