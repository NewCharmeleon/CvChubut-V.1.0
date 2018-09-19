@extends('layouts.app')

@section ('title', 'Actividades : editar')
  
@section ('content')

    <form action="{{ route('actividades.update', $actividad->id ) }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $actividad->nombre }} <small> Editar </small> </h3>
            </div>
            <div class="panel-body")
                 <input type"hidden" name="method" value="put">
                 @include('actividad.partials.form')
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-primary" href="{{ route('actividades.index') }}"> Volver</a>
            </div>
        </div>
    </form>    
@endsection  
