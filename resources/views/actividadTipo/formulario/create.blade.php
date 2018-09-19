
@extends("layouts.app")
@section ('title', 'Tipos de Actividades: Nuevo')
  
@section ('content')
    <form action="{{ route('actividades.tipos.store') }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Tipos de Actividades <small> Nueva </small></h3>
            </div>
            <div class="panel-body")
                @include('actividadTipo.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('actividades.tipos.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection