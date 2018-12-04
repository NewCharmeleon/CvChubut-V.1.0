
@extends("layouts.appAce")
@section ('title', 'Tipos de Actividades: Ver')
  
@section ('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $actividad_tipo->nombre }} 
            <span class="label label-xlg label-success arrowed-right">Ver</span>
                                    </small>
                                    </h3>
        </div>

        <div class="panel-body")
            <form action="" class="form-horizontal"> 
             @include('actividadTipo.partials.show')
            </form>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('actividades.tipos.index')}}"> Volver </a>    
            <a class="btn btn-warning" href="{{ route('actividades.tipos.edit', $actividad_tipo->id) }}"> Editar </a>    
        
        </div>
    </div>
        
    

@endsection