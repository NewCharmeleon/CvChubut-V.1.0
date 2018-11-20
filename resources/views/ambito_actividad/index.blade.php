@extends('layouts.app')

@section ('title', 'Ambitos de Actividades')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Ambitos de Actividades</u></b></h4></caption>
      <a href="{{ route('ambitos.actividades.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table id='datatable' class="table table-hover">
        
        <thead>
         <tr>
             <th>Nombre</th>
             <th>Descripci&oacute;n</th>
             <th>Acciones</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($ambitos_actividades as $id => $ambito_actividad)
          <tr>
             
            
             <td>{{ $ambito_actividad->nombre }}</td>
             <td>{{ $ambito_actividad->descripcion }}</td>
             <td>
                  <a href="{{ route('ambitos.actividades.show',$ambito_actividad->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('ambitos.actividades.edit',$ambito_actividad->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
             </td>
             
          </tr>  
          @endforeach
        </tbody>
      </table>
      <div class="center">
        {{ $ambitos_actividades->links() }}
      </div>
      
   </div>

  </div>

@endsection