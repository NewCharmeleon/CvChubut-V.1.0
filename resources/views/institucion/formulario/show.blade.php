@extends('layouts.app')

@section ('title', 'Institucion : Ver')
  
@section ('content')

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $institucion->nombre }} <small> Ver </small> </h3>
        </div>
        <div class="panel-body")
                <form action="" class="form-horizontal">
                    @include('institucion.partials.show')
                </form>
        </div>        
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('instituciones.index') }}"> Volver</a>  
            <a class="btn btn-warning" href="{{ route('instituciones.edit', $institucion->id) }}"> Editar</a>
        </div>
    </div>
       
@endsection  
