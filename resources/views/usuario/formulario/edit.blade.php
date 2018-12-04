@extends('layouts.appAce')

@section ('title', 'Usuario : editar')
  
@section ('content')

    <form action="{{ route('usuarios.update', $user->id ) }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $user->persona->nombre_apellido }} 
              <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")
                 <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 @include('usuario.partials.form_user')
            </div>        
            <div class="panel-footer">
                <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Volver</a>  
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-warning" href="{{ route('usuarios.edit', $user->id) }}"> Editar</a>
            </div>
        </div>
    </form>    
@endsection  
