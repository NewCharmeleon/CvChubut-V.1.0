@extends('layouts.app')

@section ('title', 'Carreras')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Carreras</u></b></h4></caption>
      <a href="{{ route('carreras.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table class="table" id="table">
        
        <thead>
         <tr>
             <th>Nombre </th>
             <th>Cantidad de Materias </th>
             <th>Acciones </th>
         </tr>
        </thead>
        <tbody>
          @foreach ($carreras as $carrera)
          <tr>
             
            
             <td>{{ $carrera->nombre }}</td>
             <td>{{ $carrera->cantidad_materias }}</td>
             <td>
                  <a href="{{ route('carreras.show',$carrera->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('carreras.edit',$carrera->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
             </td>
             
          </tr>  
          @endforeach
          @if ( $carreras->count() == 0 )
            <tr>
              <td colspan="3" align="center">
                <strong> No posee Carreras registradas </strong>
              </td>
            </tr>
          @endif    
        </tbody>
      </table>
      <div class="center">
        {{ $carreras->links() }}
      </div>
      
   </div>

  </div>
  <script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endsection