
@extends("layouts.appAce")
@section ('title', 'Ambitos de Actividades: Ver')
  
@section ('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $ambito_actividad->nombre }} 
            <span class="label label-xlg label-success arrowed-right">Ver</span>
                                    </small>
                                    </h3>
        </div>

        <div class="panel-body")
            <form action="" class="form-horizontal"> 
             @include('ambito_actividad.partials.show')
            </form>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('ambitos.actividades.index')}}"> Volver </a>    
            <a class="btn btn-warning" href="{{ route('ambitos.actividades.edit', $ambito_actividad->id) }}"> Editar </a>    
        
        </div>
    </div>
        
    

@endsection