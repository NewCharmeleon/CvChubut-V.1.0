@extends('layouts.appAce')

@section ('title', 'Instituciones: Nueva')
  
@section ('content')

    <form action="{{ route('instituciones.store') }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Instituciones <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-primary arrowed-right">Nueva</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")
               
               @include('institucion.partials.form')
               
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('instituciones.index') }}"> Volver</a>  
            </div>
        </div>
    </form>
       
@endsection  
