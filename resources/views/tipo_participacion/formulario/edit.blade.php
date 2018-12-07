@extends("layouts.appAce")
@section('title','Tipos de Participaciones: editar')

@section('content')
<form action="{{ route('tipos.participaciones.update',$tipo_participacion->id )}}" method="POST" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $tipo_participacion->nombre  }}
           <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3>
           </div>
        <div class="panel-body">
                <input type="hidden" name="_method" value="put">
                @include('tipo_participacion.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('tipos.participaciones.index') }}"> Volver</a>
            </div>
        </div>    
        
</form>
@endsection

