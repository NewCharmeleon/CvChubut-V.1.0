@extends('layouts.appAce')

@section ('title', 'Experiencias Laborales')

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
        
 
        
    
@endsection 
        
       
@section ('content')

    <div class="row col-xs-12" id="table-ace">
        <div class="col-xs-12">
              
            <h2 class="header smaller lighter blue ">Listado de Experiencias Laborales de {{ $persona->nombre_apellido}}
            <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <span class="label label-md label-primary arrowed-right">Ver Resultados</span></small></h2>
                        
                
            <div class="pull-right">
                @role(['Estudiante'])
                    <div class="">
                        <a href="{{ route('experiencias.laborales.create')  }}" class="btn btn-primary">  Nueva  </a>
                        <a href="{{ route('curriculum.pdf')  }}" class="btn btn-primary" target="_blank">  Exportar a PDF  </a>
                    
                    </div>
                @endrole </div>&nbsp;&nbsp;
            <br>

            <!-- div.table-responsive -->  
            <table id="data-table" class="table table-striped table-bordered table-hover dataTable no-footer" style="width:100%">
                <thead>
                    <tr>
                        <th>Puesto </th>
                        <th>Descripci&oacute;n de Tareas </th>
                        <th>Empleador </th>
                        <th>Acciones </th>
                        <th>Mostrar en Cv </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiencias_laborales as $id => $experiencia_laboral)
                    <tr>
                                
                        <td>{{ $experiencia_laboral->puesto }}</td>
                        <td>{{ $experiencia_laboral->descripcion_de_tareas }}</td>
                        <td>{{ $experiencia_laboral->empleador }}</td>
                        <td >
              
                          

                        <a href="{{ route('experiencias.laborales.show',$experiencia_laboral->id )  }}"   ><i class="ace-icon fa fa-search-plus bigger-130"></i></a>
                        <a href="{{  route('experiencias.laborales.edit',$experiencia_laboral->id )   }}" ><i class="ace-icon fa fa-pencil bigger-130 green"></i></a>
                    
                    
                        <a href="#" onclick="event.preventDefault();document.getElementById('form-experiencia-laboral-{{ $experiencia_laboral->id }}').submit();"> 
                                <i class="ace-icon fa fa-trash-o bigger-130 red" ></i>
                        </a>
                        

                        <form action="{{ route('experiencias.laborales.destroy',$experiencia_laboral->id)  }}"  method="POST" id="form-experiencia-laboral-{{ $experiencia_laboral->id }}" style="display:none">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                        </form>

                   
                   
                
              
                
                        </td>
                        <td class="btn-td" id="{{ $experiencia_laboral->id }}">
                            {!!    $experiencia_laboral->btn_mostrar()    !!}
                        </td>
                    </tr>  
                    @endforeach
                    @if ( $experiencias_laborales->count() == 0 )
                        <tr>
                            <td colspan="5" align="center">
                                <strong> No posee Experiencia Laboral Registrada </strong>
                            </td>
                        </tr>
                    @endif          
                </tbody>
            </table>
      <!--div class="center">
        {{ $experiencias_laborales->links() }}
      </div-->
      
   </div>

  </div>

@endsection

 @section('scripts')
 
    <script>
            $(document).ready(function() {
                var id = $(this).data('id');
        $('#data-table').DataTable( {
            
            //"dom": '<"top"i>rt<"bottom"flp><"clear">',
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
                },
                "columnDefs": [ 
                    { targets: 3, searchable: false },
                    { targets: 3, orderable: false }, 
                    { targets: 3, exportable: false }, 
                    { targets: 3, searchable: false },
                    { targets: 3, orderable: false }, 
                    { targets: 3, exportable: false }, 
                   /* { targets: [1,2], searchable: true }, 
                    { targets: '_all', searchable: false } */
                ],

            },
            "fnDrawCallback": function() {
                    $('.btn-td .mostrar_ocultar').bootstrapSwitch({
                       // size: 'small',
                       // onText: 'YES',
                       // offText: 'NO',
                       // onColor: 'primary',
                       // offColor: 'default',
                        onSwitchChange: function (event, state) {

                             //Se previene el evento
                            event.preventDefault();
                            //ponemos que por defecto no tengamos Error en el Ajax
                            var error = false;
                            //Obtenemos el id de la Actividad Registrada
                            var id = $(event.target).parent().parent().parent('td').attr('id');
                            
                            //por defecto la Url esta activada en Mostrar Actividad
                            //y Agregamos un comodin para el id
                            var url = "{{ route('experiencias.laborales.mostrar.cv','#') }}";
                            //verificamos el estado de la operacion
                            if (state != true ){
                                url = "{{ route('experiencias.laborales.ocultar.cv','#' ) }}";
                            }
                            //reemplazamos en la ruta el comodin por el Id de la Actividad
                            url = url.replace('#',id);
                            //Realizamos una Peticion Asincronica para obtener los cambios
                            $.ajax({
                                url: url,
                                async: false,
                                method: "POST",
                                success: function(json){
                                    //si actualiza
                                    if (json.update == true){
                                        alert('Haz actualizado una Experiencia Laboral');
                                        console.log( 'error',error);
                                        console.log( 'json',json);
                                        console.log( 'stado',state);
                                        console.log( 'url',url);
                                        console.log( 'id', id);
                                        console.log( 'target',event.target);
                                    }
                                    //si se mantiene
                                    else if (json.igual == true ){
                                        
                                        return -1;
                                    }
                                    //sino se Actualizo
                                    else{
                                        alert('No Actualizada');
                                        error = true;
                                        console.log( 'error',error);
                                        console.log( 'json',json);
                                        console.log( 'stado',state);
                                        console.log( 'url',url);
                                        console.log( 'id', id);
                                        console.log( 'target',event.target);
                                        
                                    }
                                    return -1;
                                }
                            });
                            //Si se genera Error en el Ajax
                            if ( error == true ){
                                //Se mantiene el Estado del Boton antes del cambio
                                $(this).bootstrapSwitch('state', state);
                                return -1;
                            }
                           
                        }
                    });
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
         /*   $(function($){
                $('.btn-td .mostrar_ocultar').bootstrapSwitch();
                $('.btn-td .mostrar_ocultar').on('switchChange.bootstrapSwitch', function (event, state) {
                    //Se previene el evento
                    event.preventDefault();
                    //ponemos que por defecto no tengamos Error en el Ajax
                    var error = false;
                    //Obtenemos el id de la Actividad Registrada
                    var id = $(event.target).parent().parent().parent('div').attr('id');
                    //por defecto la Url esta activada en Mostrar Actividad
                    //y Agregamos un comodin para el id
                    var url = "{{ route('experiencias.laborales.mostrar.cv','#') }}";
                    //verificamos el estado de la operacion
                    if (state != true ){
                        url = "{{ route('experiencias.laborales.ocultar.cv','#' ) }}";
                    }
                    //reemplazamos en la ruta el comodin por el Id de la Actividad
                    url = url.replace('#',id);
                    //Realizamos una Peticion Asincronica para obtener los cambios
                    $.ajax({
                        url: url,
                        async: false,
                        method: "POST",
                        success: function(json){
                            //si actualiza
                            if (json.update == true){
                                alert('Haz actualizado una Experiencia Laboral');
                            }
                            //si se mantiene
                            else if (json.igual == true ){
                                
                                return -1;
                            }
                            //sino se Actualizo
                            else{
                                alert('No Actualizada');
                                error = true;
                            }
                            return -1;
                        }
                    });
                    //Si se genera Error en el Ajax
                    if ( error == true ){
                        //Se mantiene el Estado del Boton antes del cambio
                        $(this).bootstrapSwitch('state', status);
                        return -1;
                    }
                });
            });*/           
        </script>

@endsection 