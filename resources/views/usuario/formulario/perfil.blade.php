@extends('layouts.app')

@section ('title', 'Perfil')
  
@section ('content')

  <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> {{ $user->persona->nombre_apellido} <small> Perfil </small> </h3>
    </div>
    <div class="panel-body")
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