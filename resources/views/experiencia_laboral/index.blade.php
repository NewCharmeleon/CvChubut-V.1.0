@extends('layouts.appAce')

@section ('title', 'Experiencias Laborales')

       
@section ('content')

    <div class="row col-xs-12" >
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
                @endrole    
            </div>&nbsp;&nbsp;
            <br>

            <!-- div.table-responsive -->  
            <table id="data-table" class="table table-striped table-bordered table-hover dataTable no-footer" style="width:100%">
                <thead>
                    <tr>
                        <th>Puesto </th>
                        <th>Descripci&oacute;n de Tareas </th>
                        <th>Empleador </th>
                        <th>Fecha de Inicio </th>
                        <th>Fecha de Fin </th>
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
                        <td>{{ $experiencia_laboral->fecha_ini_show }}</td>
                        <td>{{ $experiencia_laboral->fecha_fin_show }}</td>
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
        
        
                  @if(  $experiencias_laborales->count() == 0   )
                    <tr>
                      <td colspan="5" align="center">
                      <strong>  No tiene experiencias laborales registradas  </strong>
                      </td>
                    </tr>
                  @endif
        
              </tbody>
            </table>
            <div class="center">
              {{ $experiencias_laborales->links() }}
            </div>
        
           </div>
        
        
          </div>
        
        @endsection
        
        
        @section('scripts')
        
        <script>
          $(function($){
            $('.btn-td .mostrar_ocultar').bootstrapSwitch();
        
            $('.btn-td .mostrar_ocultar').on('switchChange.bootstrapSwitch', function (event, state) {
              //se previene el evento
              event.preventDefault();
              var error = false; //por defecto no hay error en el ajax
        
              //se obtine el id de la td previamente registrado
              var id = $(event.target).parents('td').attr('id');
              var url = "{{  route('experiencias.laborales.mostrar.cv','#')  }}"; //por defecto de la ruta es mostrar cv
              
              if(  state != true ){ //si el status de la operacion el false se reemplaza por ocultar
                url ="{{  route('experiencias.laborales.ocultar.cv','#')  }}";
              }
              
              //se agrega el id al la ruta reemplazando el comodin
              url = url.replace('#',id);
        
                 //peticion ajax asyncronica para obtener los cambios 
              $.ajax({
                url: url,
                async: false,
                method: "POST",
                success: function(json){
        
                  if( json.update == true){  //si se actualizo
                    alert('se actualizo');
                  }else if(  json.igual == true  ){ //sino se actualizo porque es igual al estado actual
                    return -1;
                  }
                  else{ //si no se actualizo 
                    alert('no se actualizo');
                    error = true;
                  }
                  return -1;
                }
              });
          
              if(   error == true  ){ //si se genero un error en el ajax
                $(this).bootstrapSwitch('state', state ); //matiene el estado antes del cambio
                return -1;
              }
              
            });
         
          });
        </script>
        
        @endsection