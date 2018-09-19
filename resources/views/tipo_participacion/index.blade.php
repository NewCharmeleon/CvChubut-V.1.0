@extends('layouts.app')

@section ('title', 'Tipos de Participaciones')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Tipos de Participaci&oacute;n</u></b></h4></caption>
      <a href="{{ route('tipos.participaciones.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table class="table table-hover">
        
        <thead>
         <tr>
             <th>Nombre</th>
             <th>Descripci&oacute;n</th>
             <th>Acciones</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($tipos_participaciones as $id => $tipo_participacion)
          <tr>
             
            
             <td>{{ $tipo_participacion->nombre }}</td>
             <td>{{ $tipo_participacion->descripcion }}</td>
             <td>
                  <a href="{{ route('tipos.participaciones.show',$tipo_participacion->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('tipos.participaciones.edit',$tipo_participacion->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
             </td>
             
          </tr>  
          @endforeach
        </tbody>
      </table>
      <div class="center">
        {{ $tipos_participaciones->links() }}
      </div>
      
   </div>

  </div>

@endsection