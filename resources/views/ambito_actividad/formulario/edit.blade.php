@extends('layouts.appAce')
@section('title','Ámbitos de Actividades: editar')

@section('content')
<form action="{{ route('ambitos.actividades.update',$ambito_actividad->id )}}" method="POST" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $ambito_actividad->nombre  }}<i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3></div>
        <div class="panel-body">
                <input type="hidden" name="_method" value="put">
                @include('ambito_actividad.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('ambitos.actividades.index') }}"> Volver</a>
            </div>
        </div>    
        
</form>
@endsection