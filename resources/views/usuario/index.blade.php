@extends('layouts.app')

@section ('title', 'Usuarios')
  
@section ('content')

  <div class="panel panel-default">
    <div class="panel-body")

      <caption><h4><b><u>Listado de Usuarios</u></b></h4></caption>
      <table class="table table-hover">

        <thead>
          <tr>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $id => $usuario)
          <tr>
            <td>{{ $usuario->persona->nombre_apellido }}</td>
            <td>{{ $usuario->rol }}</td>
            <td> 
              <a href="{{ route('usuarios.show',$usuario->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
              <a href="{{ route('usuarios.edit',$usuario->id) }}" > <i class="glyphicon glyphicon-edit model-acction"></i> </a>
            
              <a href="#" onclick="event.preventDefault();document.getElementById('form-user-{{ $usuario->id }}').submit();">
                <i class="glyphicon glyphicon-trash model-acction"></i>
              </a>

              <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST" id="form-user-{{ $usuario->id }}">
                <input type="hidden" name="_method" value="delete">
                  {{ csrf_field() }}
              </form>    
            </td>
          </tr>                  
          @endforeach
        </tbody>
    </table>
    <div class="center">
      {{ $usurios->links() }}
    </div>
  <div class="panel-header">
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary"> Nuevo </a>  
  </div>
  
@endsection  