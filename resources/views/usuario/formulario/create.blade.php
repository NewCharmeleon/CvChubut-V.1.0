@extends('layouts.appAce')

@section ('title', 'Usuario : nuevo')
  
@section ('content')

    <form action="{{ route('usuarios.store') }}" method="POST" lang="es" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Usuario <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-primary arrowed-right">Nuevo</span>
                                    </small>
                                    </h3>
            </div>
            <div class="panel-body")
               
               @include('usuario.partials.form_user')
               
            </div>        
            <div class="panel-footer">
                <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Volver</a>  
                <button type="submit" class="btn btn-succes"> Guardar</button>
            </div>
        </div>
    </form>
       
@endsection  
