@extends('layouts.app')

@section ('title', 'Estudiantes : editar')
  
@section ('content')

    <form action="{{ route('estudiantes.update', $user->id ) }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> {{ $persona->nombre_apellido }} <small> Editar </small> </h3>
            </div>
            <div class="panel-body")
                 <input type"hidden" name="method" value="put">
                 @include('estudiante.partials.form')
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Volver</a>
            </div>
        </div>
    </form>    
@endsection  
