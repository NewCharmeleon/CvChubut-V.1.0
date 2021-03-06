@extends('layouts.appAce')

@section ('title', 'Estudiantes : editar')
  
@section ('content')

    <form action="{{ route('estudiantes.update', $user->id ) }}" method="POST" lang="es" class="form-horizontal">
        
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $persona->nombre_apellido }} 
              <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")>
                 
                 <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 @include('estudiante.partials.form')
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Volver</a>
            </div>
        </div>
    </form>    
@endsection  
