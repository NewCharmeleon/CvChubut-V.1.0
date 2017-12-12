@extends('app.layout')
@section('menu')
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


@endsection
