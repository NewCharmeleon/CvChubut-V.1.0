
@extends('layouts.appAce')
@section('title','Perfil de Carrera')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> {{ $user->persona->nombre_apellido}} </h3>
        <h3> Perfil de Carrera <small><i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Ver</span>
                                    </small>
                                    </h3>
    </div>
    <div class="panel-body">
        <form action="" class="form-horizontal">

            @role(['Secretaria', 'Administrador']) 
                @include('carrera.partials.show')
            @endrole

            @role(['Estudiante'])
                @include('carrera.partials.show_perfil') 
            @endrole

        </form>    
    </div>        
    <div class="panel-footer">
        <a class="btn btn-primary" href="{{ url('/') }}"> Volver</a>  
        <a class="btn btn-warning" href="{{ route('carrera.perfil.edit') }}"> Editar</a>
    </div>
  
@endsection  
@section('script')
@endsection