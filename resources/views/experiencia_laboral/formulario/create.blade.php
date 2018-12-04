@extends('layouts.appAce')

@section ('title', 'Experiencia Laboral: nueva')
  
@section ('content')

    <form action="{{ route('experiencias.laborales.store') }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Experiencias Laborales <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-primary arrowed-right">Nueva</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")
               
               @include('experiencia_laboral.partials.form')
               
            </div>        
            <div class="panel-footer">
                <button type="submit" class="btn btn-success"> Guardar</button>
                <a class="btn btn-primary" href="{{ route('experiencias.laborales.index') }}"> Volver</a>  
            </div>
        </div>
    </form>
       
@endsection  
