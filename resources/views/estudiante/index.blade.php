@extends('layouts.app')

@section ('title', 'Estudiantes')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Estudiantes</u></b></h4></caption>
      <a href="{{ route('estudiantes.create')  }}" class="btn btn-primary">  Nueva  </a>
      <a href="{{ route('agregar.estudiantes.show')  }}" class="btn btn-primary">  Agregar Estudiantes  </a>

      <table class="table table-hover">
        
        <thead>
         <tr>
             <th>Nombre y Apellido </th>
             <th>D.N.I. </th>
             <th>Carrera </th>
             <th>Cantidad de Materias</th>
             <th>Cantidad de Materias Aprobadas </th>
             <th>Acciones</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($estudiantes as $id => $estudiante)
          <tr>
             
            
             <td>{{ $estudiante->persona->nombre_apellido }}</td>
             <td>{{ $estudiante->persona->dni }}</td>
             <td>{{ isset ($estudiante->persona->carrera ) ? $estudiante->persona->carrera->nombre : 'No registrada.' }}</td>
             <td>{{ isset ($estudiante->persona->carrera ) ? $estudiante->persona->carrera->cantidad_materias : 'No registradas.' }}</td>
             <td>{{ isset ($estudiante->persona->carrera ) ? $estudiante->persona->carrera->materias_aprobadas : 'Materias Aprobadas No Registradas.' }}</td>
             <td>
                  <a href="{{ route('estudiantes.show',$estudiante->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('estudiantes.edit',$estudiante->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
                  
             </td>
             
          </tr>  
          @endforeach
          @if ( $estudiantes->count() == 0 )
            <tr>
                <td colspan="5" align="center">
                    <strong> No existen Estudiantes Registrados </strong>
                 </td>
            </tr>
          @endif          
        </tbody>
      </table>
      <div class="center">
        {{ $estudiantes->links() }}
      </div>
      
   </div>

  </div>

@endsection