
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre') )?   'has-error' : ''}}   ">  
        <label for="nombre" class="control-label col-sm-3"> Nombre <sup>*</sup> </label>
        <div class="col-sm-6">
           <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{  ( Session::has('errors') ) ?  old('nombre', null ) : ( isset($actividad)?  $actividad->nombre : null )   }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$"> 
            @if ($errors->has('nombre')) 
                @foreach ( $errors->get('nombre') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>  
 


<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('lugar') )?   'has-error' : ''}}   ">  
        <label for="lugar" class="control-label col-sm-3"> Lugar  <sup>*</sup></label>
        <div class="col-sm-6">
           <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugares" value="{{  ( Session::has('errors') ) ?  old('lugar', null ) : ( isset($actividad)?  $actividad->lugar : null )   }}"  required> 
            @if ($errors->has('lugar')) 
                @foreach ( $errors->get('lugar') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group   {{ ( $errors->has('fecha_inicio') )?   'has-error' : ''}}   ">  
        <label for="fecha_inicio" class="control-label col-sm-3"> Fecha de Inicio  *</label>
        <div class="col-sm-6">
            <input type="text" class="form-control date" name="fecha_inicio" id="fecha_inicio" placeholder="dd-mm-aaaa" value="{{ (Session::has('errors')) ? old('fecha_inicio',  $hoy->format('d-m-Y') ) : ( isset($actividad)? $actividad->fecha_inicio_form : $hoy->format('d-m-Y') ) }}" required  pattern="^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$" >
            @if ($errors->has('fecha_inicio')) 
                @foreach ( $errors->get('fecha_inicio') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group   {{ ( $errors->has('fecha_fin') )?   'has-error' : ''}}   ">  
        <label for="fecha_fin" class="control-label col-sm-3"> Fecha de Finalizaci&oacute;n </label>
        <div class="col-sm-6">
            <input type="text" class="form-control date" name="fecha_fin" id="fecha_fin" placeholder="dd-mm-aaaa" value="" pattern="^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$"  >
            @if ($errors->has('fecha_fin')) 
                @foreach ( $errors->get('fecha_fin') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>



  <div class="row">
        <div class="form-group   {{ ( $errors->has('institucion_id') )?   'has-error' : ''}}   ">  
            <label for="institucion_id" class="control-label col-sm-3"> Instituci&oacute;n <sup>*</sup></label>
            <div class="col-sm-6">

                <div id="select-institucion">

               
                    <select  class="form-control" name="institucion_id" id="institucion_id" placeholder="Institición">
                    
                        @foreach ($instituciones+[ null => 'Instituciones'] as  $id =>  $institucion_select )
                        
                        <option value="{{ $id }}"  
                        
                        {{--  si hay error--}}
                        @if(  Session::has('errors')  ) 

                        {{-- selecciona la ultima institucion --}}
                            @if ( old('institucion_id', null ) == $id )
                                    selected
                            @endif

                        @else 
                        
                        {{--  si hay persona y no error --}}
                            @if(  isset( $actividad  ) )
                                    {{--  el valor de la persona --}}
                                    @if( $id == $actividad->institucion_id )
                                        selected
                                    @endif
                        

                                
                            @endif

                        @endif
                        
                        >   {{  $institucion_select }} </option>

                        @endforeach
                     </select>
                </div>
                <label class="control-label bolder blue">Registra aqui la Instituci&oacute;n para su carga</label>
                <div class="checkbox">
                    <label>
                        <input class="ace" type="checkbox" value="1" name="institucion_check" id="institucion_check" @if( old('institucion_check') == true ) checked @endif>
                                
                        <span class="lbl"></span>
                    </label>
                </div>
                <br>
                <div class="" id="nueva-institucion" style="left: 10px; margin-top:10px; display:none; border: dotted;">
                        <label for="control-label" style=""><u>Registra aqui la Instituci&oacute;n para su carga</u> </label>
                    <div style="margin-left:15px">
                        @include('institucion.partials.form_compartido')      
                    </div>
                </div>



                @if ($errors->has('institucion_id')) 
                    @foreach ( $errors->get('institucion_id') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>



  <div class="row">
        <div class="form-group   {{ ( $errors->has('actividad_tipo_id') )?   'has-error' : ''}}   ">  
            <label for="actividad_tipo_id" class="control-label col-sm-3">  Tipo de Actividad <sup>*</sup></label>
            <div class="col-sm-6">

               
                <select  class="form-control" name="actividad_tipo_id" id="actividad_tipo_id" placeholder="Actividades Tipos" required>
                
                    @foreach ($actividades_tipos+[ null => 'Tipos de Actividades'] as  $id =>  $actividad_tipo_select )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona la ultima institucion --}}
                        @if ( old('actividad_tipo_id', null ) == $id )
                                selected
                        @endif

                    @else 
                      
                    {{--  si hay persona y no error --}}
                        @if(  isset( $actividad  ) )
                                 {{--  el valor de la persona --}}
                                @if( $id == $actividad->actividad_tipo_id )
                                    selected
                                @endif
                       

                            
                        @endif

                    @endif
                    
                    >   {{  $actividad_tipo_select }} </option>

                @endforeach
                
                
                
                
                
                    </select>

                @if ($errors->has('actividad_tipo_id')) 
                    @foreach ( $errors->get('actividad_tipo_id') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>



  <div class="row">
        <div class="form-group   {{ ( $errors->has('ambito_actividad_id') )?   'has-error' : ''}}   ">  
            <label for="ambito_actividad_id" class="control-label col-sm-3"> Ambito Actividad <sup>*</sup></label>
            <div class="col-sm-6">

               
                <select  class="form-control" name="ambito_actividad_id" id="ambito_actividad_id" placeholder="Ambitos de Actividades" required>
                
                    @foreach ($ambitos_actividades+[ null => 'Ambitos de Actividades'] as  $id =>  $ambito_actividad_select )
                    
                    <option value="{{ $id }}"  
                    
                        {{--  si hay error--}}
                            @if(  Session::has('errors')  ) 

                            {{-- selecciona la ultima institucion --}}
                                @if ( old('ambito_actividad_id', null ) == $id )
                                        selected
                                @endif

                            @else 
                              
                        
                                @if(  isset( $actividad  ) )
                                        @if( $id == $actividad->ambito_actividad_id )
                                            selected
                                        @endif                             
                                @endif

                            @endif
                    
                    >   {{  $ambito_actividad_select }} </option>

                    @endforeach
                
                
                
                
                
                </select>

                @if ($errors->has('ambito_actividad_id')) 
                    @foreach ( $errors->get('ambito_actividad_id') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="form-group   {{ ( $errors->has('tipo_participacion_id') )?   'has-error' : ''}}   ">  
            <label for="tipo_participacion_id" class="control-label col-sm-3"> Tipo de Partici&oacute;n <sup>*</sup></label>
            <div class="col-sm-6">

               
                <select  class="form-control" name="tipo_participacion_id" id="tipo_participacion_id" placeholder="Tipos de Participaciones" required>
                
                    @foreach ($tipos_participaciones+[ null => 'Tipos de Participaciones'] as  $id =>  $tipo_participacion_select )
                    
                    <option value="{{ $id }}"  
                    
                        {{--  si hay error--}}
                            @if(  Session::has('errors')  ) 

                            {{-- selecciona la ultima institucion --}}
                                @if ( old('tipo_participacion_id', null ) == $id )
                                        selected
                                @endif

                            @else 
                              
                        
                                @if(  isset( $actividad  ) )
                                        @if( $id == $actividad->tipo_participacion_id )
                                            selected
                                        @endif                             
                                @endif

                            @endif
                    
                    >   {{  $tipo_participacion_select }} </option>

                    @endforeach
                
                
                
                
                
                </select>

                @if ($errors->has('tipo_participacion_id')) 
                    @foreach ( $errors->get('tipo_participacion_id') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>

          <div class="row">
        <div class="form-group   {{ ( $errors->has('modalidad_id') )?   'has-error' : ''}}   ">  
            <label for="modalidad_id" class="control-label col-sm-3"> Modalidad <sup>*</sup></label>
            <div class="col-sm-6">

               
                <select  class="form-control" name="modalidad_id" id="modalidad_id" placeholder="Modalidades" required>
                
                    @foreach ($modalidades+[ null => 'Modalidades'] as  $id =>  $modalidad_select )
                    
                    <option value="{{ $id }}"  
                    
                        {{--  si hay error--}}
                            @if(  Session::has('errors')  ) 

                            {{-- selecciona la ultima institucion --}}
                                @if ( old('modalidad_id', null ) == $id )
                                        selected
                                @endif

                            @else 
                               
                        
                                @if(  isset( $actividad  ) )
                                        @if( $id == $actividad->modalidad_id )
                                            selected
                                        @endif                             
                                @endif

                            @endif
                    
                    >   {{  $modalidad_select }} </option>

                    @endforeach
                
                
                
                
                
                </select>

                @if ($errors->has('modalidad_id')) 
                    @foreach ( $errors->get('modalidad_id') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group   {{ ( $errors->has('frecuencia') )?   'has-error' : ''}}   ">  
            <label for="frecuencia" class="control-label col-sm-3">Frecuencia </label>
            <div class="col-sm-6">
                 <select  class="form-control" name="frecuencia" id="frecuencia" placeholder="Frecuencia" required>
                
                    <option value="Unica" selected>Unica vez</option> 
                    <option value="Diaria">Diaria</option> 
                    <option value="Semanal">Semanal</option> 
                    <option value="Mensual">Mensual</option> 
                    <option value="Anual">Anual</option> 
                       
                
                
                
                </select>

                @if ($errors->has('frecuencia')) 
                    @foreach ( $errors->get('frecuencia') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div> 
     
     
     
     
    <div class="row">
        <div class="form-group   {{ ( $errors->has('duracion') )?   'has-error' : ''}}   ">  
            <label for="duracion" class="control-label col-sm-3">Duraci&oacute;n </label>
            <div class="col-sm-6">
                <input type="number" min="0" max="100" class="form-control" name="duracion" id="duracion" placeholder="--" value="{{ (Session::has('errors')) ? old('duracion', '') : ( isset($actividad)? $actividad->duracion : null ) }}" required >
                @if ($errors->has('duracion')) 
                    @foreach ( $errors->get('duracion') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group   {{ ( $errors->has('duracion_tipo') )?   'has-error' : ''}}   ">  
            <label for="duracion_tipo" class="control-label col-sm-3"></label>
            <div class="col-sm-6">
                 <select  class="form-control" name="duracion_tipo" id="frecuencia" placeholder="--" required>
                
                    <option value="Hora" selected>Hs.</option> 
                    <option value="Dia">Dia/s</option> 
                    <option value="Semana">Semana/s</option> 
                    <option value="Mes">Mes/es</option> 
                    <option value="Año">Año/s</option> 
                       
                
                
                
                </select>

                @if ($errors->has('frecuencia')) 
                    @foreach ( $errors->get('frecuencia') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div> 


    <div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('observacion') )?   'has-error' : ''}}   ">  
        <label for="observacion" class="control-label col-sm-3"> Observaci&oacute;n </label>
        <div class="col-sm-6">
           <textarea name="observacion" id="observacion" class="form-control" placeholder="Observaciones" pattern="^[a-zA-Z_áéíóúñ\s]*$" >
                {{  ( Session::has('errors') ) ?  old('descripcion', null ) : ( isset($actividad)?  $actividad->observacion: null )   }}
           </textarea> 
            @if ($errors->has('observacion')) 
                @foreach ( $errors->get('observacion') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
            
        </div>
    </div>
</div> 











<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('mostrar_cv') )?   'has-error' : ''}}   ">  
        <label for="rentado" class="control-label col-sm-3"> Mostrar en el CV ? <sup>*</sup>  </label>
        <div class="">
        

           
                <label for="mostrar_true"  class="control-label col-xs-2" style="text-align: left;" >
            
                <input name="mostrar_cv" type="radio" class="ace" id="mostrar_true" value="1"
                    @if ($errors->has('mostrar_cv') )
                        @if( old('mostrar_cv') == true) checked 
                        @endif 
                    {{--  si hay actividad y no error --}}
                    @elseif(  isset($actividad  ) )
                    {{--  el valor de mostrar la modalidad --}}
                        @if( $actividad->mostrar_cv == true )
                        checked
                        @endif
                    @else
                        checked
                    @endif
                    ><span class="lbl"> Si</span>
                </label>

                

            <label for="mostrar_false" class="control-label col-xs-2" style="text-align: left;">
                <input name="mostrar_cv" type="radio" class="ace"  id="mostrar_false" value="0"
                @if ($errors->has('mostrar_cv') )
                    @if( old('mostrar_cv') == false) checked 
                    @endif 
                {{--  si hay actividad y no error --}}
                @elseif(  isset($actividad  ) )
                {{--  el valor de mostrar la modalidad --}}
                    @if( $actividad->mostrar_cv == false )
                       checked
                    @endif
                @endif    
                        ><span class="lbl"> No</span>
            </label>
          

            @if ($errors->has('mostrar_cv')) 
                @foreach ( $errors->get('mostrar_cv') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>



@section(  'scripts')

<script>

    $(function($){

        $('#fecha_inicio').data("DateTimePicker").maxDate(  moment( "{{  $hoy->format('Y-m-d') }}") );
        $('#fecha_fin').data("DateTimePicker").maxDate(  moment( "{{  $hoy->format('Y-m-d') }}") );
    
        
        @if( Session::has('errors') ) 
            $('#fecha_fin').val("{{  old('fecha_fin', null) }}");
        @else

            @if( isset($actividad) )
                $('#fecha_fin').val("{{  $actividad->fecha_fin_form  }}");
            @else
                $('#fecha_fin').val(null);
            @endif

        @endif

     

        if( $('#institucion_check').is(':checked')){

               $('#select-institucion').hide();
               //ocultar y deseleccionar institucion
               $('#institucion_id').val(null).change();
               $('#nueva-institucion').show();
               
               //agregamos dinamicamente el required en el caso necesario
               $('#nombre_institucion').attr('required');
                //removemos dinamicamente el required en el caso necesario
               $('#institucion_id').removeAttr('required');
        }else{
                //removemos dinamicamente el required en el caso necesario
                $('#nombre_institucion').removeAttr('required');
                //agregamos dinamicamente el required en el caso necesario
                $('#institucion_id').attr('required');
        }

       $('#institucion_check').change(function(e){

            if(   $(e.target).is(':checked')    ){
               //mostrar formulario institucion
               $('#select-institucion').hide();
               //ocultar y deseleccionar institucion
               $('#institucion_id').val(null).change();
               $('#nueva-institucion').show();

               //agregamos dinamicamente el required en el caso necesario
               $('#nombre_institucion').attr('required');
                //removemos dinamicamente el required en el caso necesario
               $('#institucion_id').removeAttr('required');

            }else{
                //ocultar formulario institucion
                $('#nueva-institucion').hide();

                //vaciar formulario
                $('#nueva-institucion').find('input:text').val('');            

                //removemos dinamicamente el required en el caso necesario
                $('#nombre_institucion').removeAttr('required');
                //agregamos dinamicamente el required en el caso necesario
                $('#institucion_id').attr('required');
                //mostrar seleccionar institucion
                $('#select-institucion').show();
            }

        });
        

    });

</script>
@endsection


           
