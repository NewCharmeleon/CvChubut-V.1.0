
@extends("layouts.app")
@section ('title', 'Tipos de Participacion: Nuevo')
  
@section ('content')
    <form action="{{ route('tipos.participaciones.store') }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Tipos de Participaci&oacute;n <small> Nueva </small></h3>
            </div>
            <div class="panel-body")
                @include('tipo_participacion.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('tipos.participaciones.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection