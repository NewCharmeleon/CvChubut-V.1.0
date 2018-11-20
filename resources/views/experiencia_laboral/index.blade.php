@extends('layouts.app')

@section ('title', 'Experiencias Laborales')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Experiencias Laborales de {{ $persona->nombre_apellido}}</u></b></h4></caption>
      
      @role(['Estudiante'])
        <div class="">
            <a href="{{ route('experiencias.laborales.create')  }}" class="btn btn-primary">  Nueva  </a>
      
        </div>
      @endrole        
      
      <table id='datatable' class="table table-hover">
        
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
              
                          

                  <a href="{{ route('experiencias.laborales.show',$experiencia_laboral->id )  }}"   ><i class="glyphicon glyphicon-eye-open model-acction"></i></a>
                  <a href="{{  route('experiencias.laborales.edit',$experiencia_laboral->id )   }}" ><i class="glyphicon glyphicon-edit model-acction"></i></a>
               
               
                  <a href="#" onclick="event.preventDefault();document.getElementById('form-experiencia-laboral-{{ $experiencia_laboral->id }}').submit();"> 
                        <i class="glyphicon glyphicon-trash model-acction" ></i>
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
            });           
        </script>

@endsection   