@extends("layouts.app")
@section ('title', 'Tipos de Actividades: Editar')
  
@section ('content')
    <form action="{{ route('actividades.tipos.update', $actividad_tipo->id) }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $actividad_tipo->nombre }} <small> Editar </small></h3>
            </div>
            <div class="panel-body")
                <input type="hidden" name="_method" value="put">
                @include('actividadTipo.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('actividades.tipos.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection