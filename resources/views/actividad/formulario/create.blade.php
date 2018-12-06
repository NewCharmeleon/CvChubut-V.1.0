@extends('layouts.appAce')

@section ('title', 'Actividades: nueva')
  
@section ('content')

    <form action="{{ route('actividades.store') }}" method="POST" lang="es" class="col-lg-12 col-offset-lg-1 form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Actividades <small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-primary arrowed-right">Nueva</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")
               
               @include('actividad.partials.form')
               
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('actividades.index') }}"> Volver</a>  
            </div>
        </div>
        
    </form>
       
@endsection  
