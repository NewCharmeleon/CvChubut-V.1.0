
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre') )?   'has-error' : ''}}   ">  
        <label for="nombre" class="control-label col-sm-3"> Nombre <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre" value="{{ (Session::has('errors')) ? old('nombre', null) :  ( isset($actividad)?  $actividad->nombre : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
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
        <label for="lugar" class="control-label col-sm-3"> Lugar <sup>*</sup></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="lugar" id="lugar"  placeholder="Lugar" value="{{ (Session::has('errors')) ? old('lugar', null) : ( isset($actividad)? $actividad->lugar: null ) }}" required >
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
        <label for="fecha_inicio" class="control-label col-sm-3"> Fecha de Inicio *</label>
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

               <select name="institucion_id" id="institucion_id" placeholder="Institución" class="form-control">

                 @foreach ($instituciones+[ null => 'Institución'] as  $id => $institucion_select )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona la ultima institucion --}}
                        @if ( old('institucion_id', null) == $id )
                                selected
                        @endif

                    @else 
                    {{--  si hay actividad y no error --}}
                        @if(  isset($actividad  ) )
                            {{--  el valor de la institucion --}}
                            @if( $id == $actividad->institucion_id )
                                    selected
                            @endif

                            
                        @endif

                    @endif
                    
                    >   {{  $institucion_select }} </option>

                @endforeach
            
            
                </select>
            </div>

            <label for="" style="margin-top:25px; width:55%;" ><input type="checkbox" name="institucion_check" id="institucion_check" value="1" @if( old('institucion_check') == true ) checked @endif> No esta la Instituci&oacute;n? click aqui</label>   
            <div class="" id="nueva-institucion" style="margin-top:10px; display:none; border: dotted;">
                <label for="control-label" style=""><u>Registra aqui la Instituci&oacute;n para su carga</u> </label>
                    @include('institucion.partials.form_compartido')      
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
        <label for="actividad_tipo_id" class="control-label col-sm-3"> Tipo de Actividad <sup>*</sup></label>
        <div class="col-sm-6">

            <select class="form-control" name="actividad_tipo_id" id="actividad_tipo_id" placeholder="Tipos de Actividades" required>

                 @foreach ($actividades_tipos+[ null => 'Tipos de Actividades'] as  $id => $actividad_tipo_select )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona el ultimo tipo de actividad --}}
                        @if ( old('actividad_tipo_id', null) == $id )
                                selected
                        @endif

                    @else 
                    {{--  si hay actividad y no error --}}
                        @if(  isset($actividad  ) )
                            {{--  el valor del tipo de actividad --}}
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
        <label for="ambito_actividad_id" class="control-label col-sm-3"> Ambito de Actividad <sup>*</sup></label>
        <div class="col-sm-6">

            <select class="form-control" name="ambito_actividad_id" id="ambito_actividad_id" placeholder="Ambito de Actividades" required>

                 @foreach ($ambitos_actividades+[ null => 'Ambito de Actividades'] as  $id => $ambito_actividad_select )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona el ultimo ambito de actividad --}}
                        @if ( old('ambito_actividad_id', null) == $id )
                                selected
                        @endif

                    @else 
                    {{--  si hay actividad y no error --}}
                        @if(  isset($actividad  ) )
                            {{--  el valor del ambito de actividad --}}
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
        <label for="tipo_participacion_id" class="control-label col-sm-3"> Tipo de Participaci&oacute;n <sup>*</sup></label>
        <div class="col-sm-6">

            <select class="form-control" name="tipo_participacion_id" id="tipo_participacion_id" placeholder="Tipo de Participación" required>

                 @foreach ($tipos_participaciones+[ null => 'Tipos de Participacion'] as  $id => $tipo_participacion_select )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona el ultimo tipo de participacion --}}
                        @if ( old('tipo_participacion_id', null) == $id )
                                selected
                        @endif

                    @else 
                    {{--  si hay actividad y no error --}}
                        @if(  isset($actividad  ) )
                            {{--  el valor del tipo de participacion --}}
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

            <select class="form-control" name="modalidad_id" id="modalidad_id" placeholder="Modalidad" required>

                 @foreach ($modalidades+[ null => 'Modalidades'] as  $id => $modalidad_select )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona la ultima modalidad --}}
                        @if ( old('modalidad_id', null) == $id )
                                selected
                        @endif

                    @else 
                    {{--  si hay actividad y no error --}}
                        @if(  isset($actividad  ) )
                            {{--  el valor de la modalidad --}}
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
    <div class="form-group has-feedback   {{ ( $errors->has('mostrar_cv') )?   'has-error' : ''}}   ">  
        <label for="mostrar_cv" class="control-label col-sm-3"> Mostrar en Cv? <sup>*</sup> </label>
        <div class="">
            
            <label for="mostrar_true" class="control-label col-xs-2" style="text-align: left;">Si
                <input type="radio" name="mostrar_cv" id="mostrar_true" value="1"
                @if ($errors->has('mostrar_cv') )
                    @if( old('mostrar_cv') == true) checked 
                    @endif 
                {{--  si hay actividad y no error --}}
                @elseif(  isset($actividad  ) )
                {{--  el valor de mostrala modalidad --}}
                    @if( $$actividad->mostrar_cv == true )
                       checked
                    @endif
                @else
                    checked
                @endif
                    >
            </label>

            <label for="mostrar_false" class="control-label col-xs-2" style="text-align: left;">No
                <input type="radio" name="mostrar_cv" id="mostrar_false" value="0"
                @if ($errors->has('mostrar_cv') )
                    @if( old('mostrar_cv') == false) checked 
                    @endif 
                {{--  si hay actividad y no error --}}
                @elseif(  isset($actividad  ) )
                {{--  el valor de mostrala modalidad --}}
                    @if( $$actividad->mostrar_cv == false )
                       checked
                    @endif
                @endif    
                        >
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


@section ('scripts')

<script>
    $(function($){

        $('#fecha_inicio').data("DateTimePicker").maxDate( moment("{{ $hoy->format('Y-m-d') }}"));  
        $('#fecha_fin').data("DateTimePicker").maxDate( moment("{{ $hoy->format('Y-m-d') }}"));  
    
        @if( Session::has('errors'))
            $('#fecha_fin').val("{{ old('fecha_fin', null) }}");
        @else 
            @if( isset($actividad))   
                $('#fecha_fin').val("{{ $actividad->fecha_fin_form }}"); 
            @else
                $('#fecha_fin').val(null);
            @endif

        @endif 

        if( $('#institucion_check').is(' :checked')){

            $('#select-institucion').hide();
            //ocultar y sacar la seleccion de Institucion
            $('#institucion_id').val(null).change();
            $('#nueva-institucion').show();

            //agregamos dinamicamente el required si se necesita
            $('#nombre_institucion').attr('required');
            //removemos dinamicamente el required si se necesita
            $('#institucion_id').removeAttr('required');
        }else{

            //removemos dinamicamente el required si se necesita
            $('#nombre_institucion').removeAttr('required');
            //agregamos dinamicamente el required si se necesita
            $('#institucion_id').attr('required');    

        }

        $('#institucion_check').change(function(e){

            if( $(e.target).is(':checked')){

                //mostramos el form de Institucion
                $('#select-institucion').hide();
                //mostramos el form nueva Institucion y sacamos la seleccion a Institucion
                $('#institucion_id').val(null).change();
                $('#nueva-institucion').show();

                //agregamos dinamicamente el required si se necesita
                $('#nombre_institucion').attr('required');
                //removemos dinamicamente el required si se necesita
                $('#institucion_id').removeAttr('required');


            }else{

                //ocultamos el form nueva Institucion
                $('#nueva-institucion').hide();
                //vaciamos el form nueva Institucion
                $('#nueva-institucion').find('input:text').val('');

                //removemos dinamicamente el required si se necesita
                $('#nombre_institucion').removeAttr('required');
                //agregamos dinamicamente el required si se necesita
                $('#institucion_id').attr('required');

                //mostramos el seleccionar Institucion
                $('#select-institucion').show();   
            }
        });

    
    });

</script>

@endsection