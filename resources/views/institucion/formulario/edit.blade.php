@extends('layouts.app')

@section ('title', 'Instituciones : editar')
  
@section ('content')

    <form action="{{ route('instituciones.update', $institucion->id ) }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $institucion->nombre }} <small> Editar </small> </h3>
            </div>
            <div class="panel-body")
                 <input type"hidden" name="method" value="put">
                 @include('institucion.partials.form')
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-primary" href="{{ route('instituciones.index') }}"> Volver</a>
            </div>
        </div>
    </form>    
@endsection  
