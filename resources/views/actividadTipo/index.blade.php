@extends('layouts.app')

@section ('title', 'Tipos de Actividades')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Tipos de Actividades</u></b></h4></caption>
      <a href="{{ route('actividades.tipos.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table class="table table-hover">
        
        <thead>
         <tr>
             <th>Nombre</th>
             <th>Descripci&oacute;n</th>
             <th>Acciones</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($actividades_tipos as $id => $actividad_tipo)
          <tr>
             
            
             <td>{{ $actividad_tipo->nombre }}</td>
             <td>{{ $actividad_tipo->descripcion }}</td>
             <td>
                  <a href="{{ route('actividades.tipos.show',$actividad_tipo->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('actividades.tipos.edit',$actividad_tipo->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
             </td>
             
          </tr>  
          @endforeach
        </tbody>
      </table>
      <div class="center">
        {{ $actividades_tipos->links() }}
      </div>
      
   </div>

  </div>

@endsection