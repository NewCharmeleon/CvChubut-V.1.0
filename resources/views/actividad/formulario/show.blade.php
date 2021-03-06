@extends('layouts.appAce')

@section ('title', 'Actividades : ver')
  
@section ('content')

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $actividad->nombre }} 
            <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-success arrowed-right">Ver</span>
                                    </small>
                                    </h3>
        </div>
        <div class="panel-body")
                <form action="" class="form-horizontal">
                    @include('actividad.partials.show')
                </form>
        </div>        
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('actividades.index') }}"> Volver</a>  
            <a class="btn btn-warning" href="{{ route('actividades.edit', $actividad->id) }}"> Editar</a>
        </div>
    </div>
       
@endsection  
