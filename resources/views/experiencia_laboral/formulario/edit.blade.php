@extends('layouts.app')

@section ('title', 'Experiencia Laboral: editar')
  
@section ('content')

    <form action="{{ route('actividades.laborales.update', $experiencia_laboral->id ) }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Experiencia Laboral de <b> {{ $persona->nombre_apellido }} </b> <b> {{ $experiencia_laboral->puesto }} </b> <small> Editar </small> </h3>
            </div>
            <div class="panel-body")
                 <input type"hidden" name="method" value="put">
                 @include('experiencia_laboral.partials.form')
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar </button>
                <a class="btn btn-primary" href="{{ route('experiencias.laborales.index') }}"> Volver</a>
            </div>
        </div>
    </form>    
@endsection 

@section('script')
@endsection
