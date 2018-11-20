@extends('layouts.app')

@section ('title', 'Estudiantes')
@section('styles')
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
   <link rel="stylesheet"  href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

@section('scripts')
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
       
    
   $(document).ready(function() {
        $('#data-table').DataTable( {
            
            //"dom": '<"top"i>rt<"bottom"flp><"clear">',
            "ordering": true,
            "pagingType": "full_numbers",
            "language": {
                "search": "Búsqueda",
                "lengthMenu": "Mostrando _MENU_ items por página",
                "zeroRecords": "No hay datos para mostrar",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No existen datos disponibles",
                "infoFiltered": "(filtrando datos de un _MAX_ total de items)",
                "paginate": {
                    "first": "Primera página",
                    "previous": "Previa",
                    "next": "Siguiente",
                    "last": "Última página",
                }
            }
             
   
        });
    }); 

            /*$('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/api/carreras", 
                columns: [
                { data: 'nombre' },
                { data: 'cantidad_materias ' },
                { data: 'acciones' }
            ]
            });
           
        });*/
        //} );
    </script>
@endsection    
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Estudiantes</u></b></h4></caption>
      <a href="{{ route('estudiantes.create')  }}" class="btn btn-primary">  Nueva  </a>
      <a href="{{ route('agregar.estudiantes.show')  }}" class="btn btn-primary">  Agregar Estudiantes  </a>

     <table class="table table-striped table-bordered table-hover" role="grid" style="width:100%" id="data-table">
      
        
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