@extends('layouts.appAce')

@section ('title', 'Actividades')

@section('styles')

    <link rel="stylesheet"  href="{{  asset('assets/css/bootstrap3-3-7.min.css')  }}">
   //<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
       // <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
       
    
   $(document).ready(function() {
        $('#data-table').DataTable( {
            
            //"dom": '<"top"i>rt<"bottom"flp><"clear">',
            "ordering": true,
            "pagingType": "full_numbers",
            "scrollY": 500,
            "scrollX": true,
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
    /*$(document).ready(function() {  
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
                "ajax": "{{ url('api/actividades') }}", 
                "columns": [
                { data: 'nombre', name: 'nombre'  },
                { data: 'lugar', name: 'lugar'  },
                { data: 'fecha_inicio', , name: 'fecha_inicio' },
                { data: 'fecha_fin', name: 'fecha_fin'  },
                { data: 'frecuencia', name: 'frecuencia'  },
                { data: 'duracion', , name: 'duracion' },
                { data: 'duracion_tipo', name: 'duracion_tipo'  },
                { data: 'observacion', name: 'observacion'  },
                
                ],
                "ordering": true,
                "pagingType": "full_numbers",
                "columnDefs": [ 
                    { targets: 2, searchable: false },
                    { targets: 2, orderable: false }, 
                    { targets: 2, exportable: false }, 
                   /* { targets: [1,2], searchable: true }, 
                    { targets: '_all', searchable: false } */
               // ],
               /* "language": {
                    "processing": "Procesando...",
                    "search": "Búsqueda",
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "No hay datos para mostrar",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No existen datos disponibles",
                    "infoFiltered": "(filtrando datos de un _MAX_ total de items)",
                    "emptyTable": "No existen Actividades para mostrar",
                    "zeroRecords": "No existen Actividades para mostrar con ese parámetro de búsqueda",
                    "paginate": {
                        "first": "Primera página",
                        "previous": "Previa",
                        "next": "Siguiente",
                        "last": "Última página",
                    }
                }
        });
           
    });*/
        //} );
    </script>
@endsection    
@section ('content')
     <div class="row col-xs-12">
        <div class="col-xs-12">
                
            <h2 class="header smaller lighter blue ">Listado de Actividades
            <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <span class="label label-md label-primary arrowed-right">Ver Resultados</span></small></h2>
                      
               
            
            <br>

            <!-- div.table-responsive -->  
             <table id="data-table" class="table table-striped table-bordered table-hover dataTable no-footer" style="width:100%">
        
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ámbito</th>
                    <th>Tipo</th>
                    <th>Modalidad</th>
                    <th>Participaci&oacute;n</th>
                    <th>Lugar</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Frecuencia</th>
                    <th>Duración</th>
                    <th>Tipo</th>
                    <th>Observaci&oacute;n</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach ($actividades as $id => $actividad)
                    
                        <tr>
                            <td>
                                {{ $actividad->nombre }}
                            </td>
                       
                            <td>
                                {{ $actividad->ambito_actividad->nombre }}
                            </td>
                       
                            <td>
                                {{ $actividad->actividad_tipo->nombre }}
                            </td>
                        
                            <td>
                                  {{ $actividad->modalidad->nombre }}
                                             
                                            
                            </td>
                       
                            <td>
                                  {{ $actividad->tipo_participacion->nombre }}
                                             
                                            
                            </td>
                      
                            <td>
                                {{ $actividad->Lugar }}
                            </td>
                        
                            <td>
                                {{ $actividad->fecha_inicio_show }}
                            </td>
                       
                            <td>
                                {{ $actividad->fecha_fin_show }}
                            </td>
                       
                            <td>
                                {{ $actividad->frecuencia }}
                            </td>
                        
                            <td>
                                {{ $actividad->duracion }}
                            </td>
                        
                            <td>
                                {{ $actividad->duracion_tipo }}
                            </td>
                        
                            <td>
                                {{ $actividad->observacion }}
                            </td>
                        </tr>
                @endforeach
                </tbody>

                
            </table>
            
         </div>
    </div>

@endsection
