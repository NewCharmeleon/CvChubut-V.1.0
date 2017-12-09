@extends('layouts.app')

@section('content')
<span class=”glyphicon glyphicon-star”></span>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        @role('administrador')
        <div class="panel-heading">Tablero de {{$rol='Administrador'}}</div>

        <div class="" style="margin-left:15px;">
          <div class="row">
            <a class="link btn btn-default" href="{{ url('api/v1.0/usuarios') }}"> <i class="glyphicon glyphicon-user"></i>Usuarios</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/personas') }}"> <i class="glyphicon glyphicon-user"></i>Personas</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
        </div>
          @endrole
          @role('operador')
          <div class="panel-heading">Tablero de {{$rol='Operador de Sistema'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/personas') }}"> <i class="glyphicon glyphicon-user"></i>Personas</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
          </div>
          @endrole
          @role('secretaria')
          <div class="panel-heading">Tablero de {{$rol='Secretaria'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/personas') }}"> <i class="glyphicon glyphicon-user"></i>Personas</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
          </div>
          @endrole


          <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/actividadesTipo') }}"> <i class="glyphicon glyphicon-education"></i>Tipo de Actividades</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/actividades') }}"><i class="glyphicon glyphicon-education"></i>Actividades Generales</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/actividadesTipo') }}"> <i class="glyphicon glyphicon-education"></i>Actividades Especificas</a>
          </div>
        </div>



        </div>
        <div class="panel-body">
                  Bienvenido {{$rol}}!
                    <div class="">
                      <h2>  @if(! Auth::guest() ) {{ Auth::user()->username }}

                      @endif
                    </h2>
                    </div>
                    <a class="link btn btn-default" href="{{ route('usuarios.index') }}"> <i class="glyphicon glyphicon-edit"></i>Editar Usuarios</a>
                    <div class="" id="load-view">

                    </div>
                      <img src=  {{ asset('imagenes/logoUDC.png') }}>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(function ($) {

    $('a.link').click(function(e) {
      e.preventDefault();

      $.get( e.target.href,function (response) {
        $('#load-view').html(response);
      });

    });




  });
</script>
@endsection
