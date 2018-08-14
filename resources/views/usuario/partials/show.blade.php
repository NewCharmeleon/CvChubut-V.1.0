@extends('layouts.app')

@section ('title')Ver Usuarios @stop
  
@section ('content')

<div class="panel panel-success col-md-10 col-md-offset-1">
  @include('layouts.menu')
  <br><br><br>
</div>
<br>
<div class="panel-heading col-md-8 col-md-offset-2">
  <h3 class="panel-title">Ver Usuario:</h3>
</div>
<div class="panel-body col-md-8 col-md-offset-2 well">
    
      <table class="table table-striped well">
        <thead>
          <tr>
           <th>Id</th>
           <th>Nombre</th>
           <th>Email</th>
           <th>Rol</th>
           </tr>
        </thead>
        <tbody>
           <tr>
             <td>{{ $usuario->id }}</td>
             <td>{{ $usuario->username }}</td>
             <td>{{ $usuario->email }}</td>
             <td>
                @foreach($usuario->roles as $role)
                  {{ $role->display_name }}
                @endforeach
             </td>
           </tr>  
        </tbody>
      </table>
    
</div>    
<div class="panel-footer col-md-8 col-md-offset-2">
    <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Volver</a>
@role('admin')

    <a class="link btn btn-default" href="{{ url('admin/users') }}"> <i class="glyphicon glyphicon-user"></i>Administrar Usuarios</a>
</div> 
@endrole
</div>
@stop