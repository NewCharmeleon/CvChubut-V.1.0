@extends('layouts.app')

@section ('title', 'Estudiantes: nuevo')
  
@section ('content')

    <form action="{{ route('estudiantes.store') }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Estudiantes <small> Nuevo </small> </h3>
            </div>
            <div class="panel-body")
               
               @include('estudiante.partials.form')
               
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Volver</a>  
            </div>
        </div>
    </form>
       
@endsection  
