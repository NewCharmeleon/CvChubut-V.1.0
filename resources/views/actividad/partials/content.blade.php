
    
    <h4><b><u>Tus Actividades:</u></b></h4>
    @role(['Estudiante'])
        <div class="" style="margin:10px 0px 0px 0px">
            <a href="{{ route('actividades.create') }}" class="btn btn-primary"> Nueva </a>  
            <a href="{{ route('curriculum.pdf')  }}" class="btn btn-primary" target="_blank">  Exportar a PDF  </a>
      

        </div>
    @endrole
    {{--dd($actividades->links())--}}
    @foreach ($actividades as $actividad) 
        <div class="row" style="margin-top:15px; margin-right:0px; margin-left: 0px; box-shadow: 2px 2px 1px 0px #2196f3;">

            <div class="pull-right" style="padding-right: 20px;">
                <a href="{{ route('actividades.show',$actividad->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                 <a href="{{ route('actividades.edit',$actividad->id) }}" > <i class="glyphicon glyphicon-edit model-acction"></i> </a>
            
                  <a href="#" onclick="event.preventDefault();document.getElementById('form-experiencia-laboral-{{ $actividad->id }}').submit();">
                  <i class="glyphicon glyphicon-trash model-acction"></i>
                 </a>
    
   
                <form action="{{ route('actividades.destroy',$actividad->id) }}" method="POST" id="form-experiencia-laboral-{{ $actividad->id }}" style="display:none">
                    <input type="hidden" name="_method" value="delete">
                     {{ csrf_field() }}
                 </form> 

                 <div class="btn-td" id="{{ $actividad->id }}">
                    {!! $actividad->btn_mostrar() !!}   
                </div>
             </div>
    

            <div class="col-sm-5">
    {{--dd($actividad->modalidad)--}}
    {{--dd($actividad->ambito_actividad)--}}
    {{--dd($actividad->institucion)--}}
                <p> <label for=""> Nombre :   </label>{{ $actividad->nombre }}</p>
                <p> <label for=""> Fecha de Inicio :   </label>{{ $actividad->fecha_inicio }}</p>
                <p> <label for=""> Instituci&oacute;n :   </label>{{ $actividad->institucion->nombre }} / {{ $actividad->institucion->localidad }}  {{ $actividad->institucion->provincia }}  {{ $actividad->institucion->pais }}</p>
            </div>
            <div class="col-sm-5">

                <p> <label for=""> Modalidad :   </label>{{ $actividad->modalidad->nombre }}</p>
                <p> <label for=""> Tipo de Participaci&oacute;n :   </label>{{ $actividad->tipo_participacion->nombre }}</p>
                <p> <label for=""> &Aacute;mbito  :   </label>{{ $actividad->ambito_actividad->nombre }} / {{ $actividad->institucion->localidad }}  {{ $actividad->institucion->provincia }}  {{ $actividad->institucion->pais }}</p>
            </div>
            
        </div>

    @endforeach

    @if ( $actividades->count() == 0 )
        <div style="text-align: center;">
            
            <strong> A&uacute;n No tienes Actividades Registradas </strong>
        </div> 
    @endif

        <div class="center">
            {{ $actividades->links() }}
        </div>
    

    <div style="padding-bottom:15px"></div>

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
                    var url = "{{ route('actividades.mostrar.cv','#') }}";

                    //verificamos el estado de la operacion
                    if (state != true ){
                        url = "{{ route('actividades.ocultar.cv','#' ) }}";
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
                                alert('Haz actualizado una Actividad');
                            }
                            //si se mantiene
                            else if (json.igual == true ){
                                
                                return -1;

                            }
                            //sino se Actualizo
                            else{
                                alert('No Actualizado');
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
 