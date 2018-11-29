@extends('layouts.app')
@section('title','Experiencia Laboral: editar')

@section('content')
<form action="{{ route('experiencias.laborales.update',$experiencia_laboral->id )}}" method="POST" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  Experiencia Laboral de <b>  {{ $persona->nombre_apellido  }}  </b>  puesto <b> {{ $experiencia_laboral->puesto }}    </b><small>  editar  </small> </h3>
        </div>
        <div class="panel-body">
            <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('experiencia_laboral.partials.form')
        </div>
        <div class="panel-footer">
            <button class="btn btn-success" type="submit"> Guardar</button>
            <a class="btn btn-primary" href="{{ route('experiencias.laborales.index') }}"> Volver</a>
        </div>
    </div>    
        
</form>
@endsection


@section('script')
@endsection
