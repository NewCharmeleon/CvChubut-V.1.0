@extends('layouts.app')

@section ('title', 'Carreras')
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
    
      <caption><h4><b><u>Listado de Carreras</u></b></h4></caption>
      <a href="{{ route('carreras.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table class="table table-striped table-bordered table-hover" role="grid" style="width:100%" id="data-table">
        
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
      
      
   </div>

  </div>
   
@endsection