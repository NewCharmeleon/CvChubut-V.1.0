@extends('layouts.app')

@section('content')
<span class=”glyphicon glyphicon-star”></span>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Tablero de Usuario</div>
          <div class="btn-group btn-group-lg">

              <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-user"></span><a href="{{ url('api/v1.0/usuarios') }}">Usuarios</button></a>
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-user"></span>Personas</button>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-user"></span>Estudiantes</button>
          </div>
        </div>
        <div class="panel-body">
                  Bienvenido {{ Auth::user()->username }}!
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
