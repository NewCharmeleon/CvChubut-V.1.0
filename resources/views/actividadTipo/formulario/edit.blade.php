@extends("layouts.appAce")
@section('title','Tipos de Actividades: editar')

@section('content')
<form action="{{ route('actividades.tipos.update',$actividad_tipo->id )}}" method="POST" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $actividad_tipo->nombre  }}<i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3></div>
        <div class="panel-body">
                <input type="hidden" name="_method" value="put">
                @include('actividadTipo.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('actividades.tipos.index') }}"> Volver</a>
            </div>
        </div>    
        
</form>
@endsection


@section('script')

@endsection



