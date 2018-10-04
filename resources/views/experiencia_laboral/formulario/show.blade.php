@extends('layouts.app')

@section ('title', 'Experiencias Laborales : ver')
  
@section ('content')

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> Experiencia Laboral de <b>{{ $persona->nombre_apellido }} </b> Puesto <b> {{$experiencia_laboral->puesto }}</b><small> Ver </small> </h3>
        </div>
        <div class="panel-body")
                <form action="" class="form-horizontal">
                    @include('experiencia_laboral.partials.show')
                </form>
        </div>        
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('experiencias.laborales.index') }}"> Volver</a>  
            <a class="btn btn-warning" href="{{ route('experiencias.laborales.edit', $experiencia_laboral->id) }}"> Editar</a>
        </div>
    </div>
       
@endsection  
