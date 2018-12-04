@extends('layouts.app')

@section ('title', 'Actividades : editar')
  
@section ('content')

    <form action="{{ route('actividades.update', $actividad->id ) }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $actividad->nombre }} 
              <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 @include('actividad.partials.form')
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-primary" href="{{ route('actividades.index') }}"> Volver</a>
            </div>
        </div>
    </form>    
@endsection  
