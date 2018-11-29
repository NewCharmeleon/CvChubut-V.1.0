@extends('layouts.app')

@section ('title', 'Actividades: nueva')
  
@section ('content')

    <form action="{{ route('actividades.store') }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Actividades <small> Nueva </small> </h3>
            </div>
            <div class="panel-body")
               
               @include('actividad.partials.form')
               
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('actividades.index') }}"> Volver</a>  
            </div>
        </div>
    </form>
       
@endsection  
