@extends('layouts.appAce')

@section('styles')
    <link rel="stylesheet"  href="{{  asset('assets/css/bootstrap3-3-7.min.css')  }}">
   
   <link rel="stylesheet"  href="{{  asset('assets/css/dataTables1-10-19.bootstrap.min.css')  }}">
   <link rel="stylesheet"  href="{{  asset('assets/css/buttons.dataTables.min.css')  }}">
@endsection   
@section('scripts')
   <script src="{{  asset('assets/js/jquery-3.3.1.js')  }}"></script>
    <script src="{{  asset('assets/js/jquery.dataTables1-10-19.min.js')  }}"></script>
    <script src="{{  asset('assets/js/dataTables1-10-19.bootstrap.min.js')  }}"></script>
    <script src="{{  asset('assets/js/dataTables.buttons.min.js')  }}"></script>
    <script src="{{  asset('assets/ajax/libs/jzip.min.js')  }}"></script>
    <script src="{{  asset('assets/ajax/libs/pdfmake.min.js')  }}"></script>
    <script src="{{  asset('assets/ajax/libs/vfs_fonts.js')  }}"></script>
    <script src="{{  asset('assets/js/buttons.html5.min.js')  }}"></script>
    <script src="{{  asset('assets/js/buttons.print.min.js')  }}"></script>
        
 
        
    <script>
    
   //$(document).ready(function() {
       /* $('#data-table').DataTable( {
            
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
    }); */
    $(document).ready(function() {
        $('#data-table').DataTable( {
            dom: 'Bfrtip',

            buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-copy bigger-110 pink"></i>',
                titleAttr: 'Copiar al Portapapeles'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o green"></i>',
                titleAttr: 'Exportar a Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-database bigger-110 orange">',
                titleAttr: 'Exportar a CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o red"></i>',
                titleAttr: 'Exportar a PDF'
            },
            ,
            {
                extend:    'print',
                text:      '<i class="fa fa-print bigger-110 grey"></i>',
                titleAttr: 'Imprimir'
            }
                

            ],
            "processing": true,
            "serverSide": true,
            "bScrollCollapse" : true,
            "scrollY": 300,
            "scrollX": true,
            "ajax": "{{ url('api/estudiantes') }}", 
            "columns": [
            { data: 'persona.nombre_apellido', name: 'persona.nombre_apellido'  },
            { data: 'persona.dni', name: 'persona.dni'  },
            { data: 'persona.carrera.nombre', name: 'persona.carrera.nombre'  },
            { data: 'persona.carrera.cantidad_materias', name: 'persona.carrera_cantidad_materias'  },
            { data: 'persona.carrera.materias_aprobadas', name: 'persona.materias_aprobadas'  },
            { data: 'btn' },
            ],
            "columnDefs": [ 
                    { targets: 5, searchable: false },
                    { targets: 5, orderable: false }, 
                    { targets: 5, exportable: false }, 
                   /* { targets: [1,2], searchable: true }, 
                    { targets: '_all', searchable: false } */
            ],
            "ordering": true,
            "pagingType": "full_numbers",
            "language": {
                "processing": "Procesando...",
                "search": "Búsqueda",
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "No hay datos para mostrar",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No existen datos disponibles",
                "infoFiltered": "(filtrando datos de un _MAX_ total de items)",
                "emptyTable": "No existen Usuarios para mostrar",
                "zeroRecords": "No existen Usuarios para mostrar con ese parámetro de búsqueda",
                "paginate": {
                    "first": "Primera página",
                    "previous": "Previa",
                    "next": "Siguiente",
                    "last": "Última página",
                }
            }
        });
        } );
    </script>
@endsection    
@section ('content')

  
    
    <div class="row col-xs-12">
        <div class="col-xs-12">
                
            <h2 class="header smaller lighter blue ">Listado de Estudiantes
            <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <span class="label label-md label-primary arrowed-right">Ver Resultados</span></small></h2>
                      
               
            <div class="pull-right">
                <a href="{{ route('estudiantes.create')  }}" class="btn btn-primary">  Nueva  </a>
                <a href="{{ route('agregar.estudiantes.show')  }}" class="btn btn-primary">  Agregar Estudiantes  </a>
            </div>&nbsp;&nbsp;
            <br>

            <!-- div.table-responsive -->  
             <table id="data-table" class="table table-striped table-bordered table-hover dataTable no-footer" style="width:100%">
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
        
      </table>
     
      
   </div>

  </div>
    <br><br>
@endsection