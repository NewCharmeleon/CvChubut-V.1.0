@extends('layouts.app')

@section('content')
<span class=”glyphicon glyphicon-star”></span>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Tablero de Usuario</div>
          <div class="btn-group btn-group-default">

              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/usuarios') }}"><b>Usuarios</b></button></a>
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/personas') }}"><n>Personas</n></button></a>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/estudiantes') }}">Estudiantes</button></a>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/oferentes') }}">Oferentes</button></a>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/referentes') }}">Referentes</button></a>


            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/actividadesTipo') }}">Tipo de Actividades</button></a>
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/actividades') }}">Actividades Generales</button></a>
            <button type="button" class="btn btn-default btn-lg">
              <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/actividadesEspecifica') }}">Actividad Especificas</button></a>
          </div>
        </div>
        <div class="panel-body">
                  Bienvenido !
                  
                  <img src="http://www.unixstickers.com/image/cache/data/buttons/png/php_logo-600x600.png" alt="Logo PHP">


        </div>
      </div>
    </div>
  </div>
</div>
@endsection
