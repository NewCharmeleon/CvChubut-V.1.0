
@extends('layouts.appAce')
@section('title','Perfil')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
        <h3> {{ $user->persona->nombre_apellido}} <small>  Perfil 
        <span class="label label-xlg label-warning arrowed-right">Ver</span>
                                    </small>
                                    </h3>
    
    </div>
    <div class="panel-body">
        <form action="" class="form-horizontal">

            @role(['Secretaria', 'Administrador']) 
                @include('usuario.partials.show_perfil')
            @endrole

            @role(['Estudiante'])
                @include('usuario.partials.show') 
            @endrole

        </form>    
    </div>        
    <div class="panel-footer">
        <a class="btn btn-primary" href="{{ url('/') }}"> Volver</a>  
        <a class="btn btn-warning" href="{{ route('perfil.edit') }}"> Editar</a>
    </div>
  
@endsection  
@section('script')
@endsection