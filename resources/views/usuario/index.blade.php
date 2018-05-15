@extends('layouts.app')

@section ('title')Usuarios @stop
  
@section ('content')
<div class="panel panel-success col-md-10 col-md-offset-1">
  @include('layouts.menu')
  <br><br><br>
</div>

<div class="col-md-10 col-md-offset-1 well">
  <table class="table table-striped">
    <caption><h4><b><u>Listado de Usuarios</u></b></h4></caption>
    <thead>
     <tr>
       <th>Id</th>
       <th>Nombre</th>
        <th>Email</th>
       <th>Role</th>
      </tr>
    </thead>
   <tbody>
    @foreach ($usuarios as $id => $usuario)
      <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->username }}</td>
        <td>{{ $usuario->email }}</td>
        <td>@foreach($usuario->roles as $role)
                {{ $role->display_name }}
          @endforeach
        </td>
        <td> 
          <div class="mbr-section-btn pull-right">
            <a href="{{ route('usuarios.show',$usuario->id) }}" > <i class="glyphicon glyphicon-eye-open"></i> </a>
        </td>
                         
    @endforeach
  </tbody>
</table>
@role('admin')
        <div>
                         
             <a class="link btn btn-default" href="{{ url('admin/users') }}"> <i class="glyphicon glyphicon-user"></i>Administrar Usuarios</a>
</div> 
@endrole
</div>
@stop