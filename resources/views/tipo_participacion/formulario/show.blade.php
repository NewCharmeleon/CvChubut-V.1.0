
@extends("layouts.app")
@section ('title', 'Tipos de Participaci&oacute;n: Ver')
  
@section ('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $tipo_participacion->nombre }} <small> Ver </small></h3>
        </div>

        <div class="panel-body")
            <form action="" class="form-horizontal"> 
             @include('tipo_participacion.partials.show')
            </form>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('tipos.participaciones.index')}}"> Volver </a>    
            <a class="btn btn-warning" href="{{ route('tipos.participaciones.edit', $tipo_participacion->id) }}"> Editar </a>    
        
        </div>
    </div>
        
    

@endsection