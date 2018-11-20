@extends("layouts.app")
@section ('title', 'Tipos de Participaci&oacute;n: Editar')
  
@section ('content')
    <form action="{{ route('tipos.participaciones.update', $tipo_participacion->id) }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $tipo_participacion->nombre }} <small> Editar </small></h3>
            </div>
            <div class="panel-body")
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include('tipo_participacion.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('tipos.participaciones.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection