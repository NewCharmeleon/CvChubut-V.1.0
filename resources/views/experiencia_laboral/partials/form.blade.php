
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('puesto') )?   'has-error' : ''}}   ">  
        <label for="puesto" class="control-label col-sm-3"> Puesto <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="puesto" id="puesto"  placeholder="Puesto" value="{{ (Session::has('errors')) ? old('puesto', null) :  ( isset($experiencia_laboral)?  $experiencia_laboral->puesto : null ) }}" required>
            @if ($errors->has('puesto')) 
                @foreach ( $errors->get('puesto') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('descripcion_de_tareas') )?   'has-error' : ''}}   ">  
        <label for="descripcion_de_tareas" class="control-label col-sm-3"> Descripci&oacute;n de Tareas <sup>*</sup></label>
        <div class="col-sm-6">
            <textarea name="descripcion_de_tareas" class="form-control" id="descripcion_de_tareas"  placeholder="Descripción" required> {{ (Session::has('errors')) ? old('descripcion_de_tareas', null) : ( isset($experiencia_laboral)? $experiencia_laboral->descripcion_de_tareas: null ) }} </textarea>
            @if ($errors->has('lugar')) 
                @foreach ( $errors->get('descripcion_de_tareas') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group   {{ ( $errors->has('fecha_ini') )?   'has-error' : ''}}   ">  
        <label for="fecha_ini" class="control-label col-sm-3"> Fecha de Inicio *</label>
        <div class="col-sm-6">
        <input type="text" class="form-control date" name="fecha_ini" id="fecha_ini" placeholder="dd-mm-aaaa" value="{{ (Session::has('errors')) ? old('fecha_ini',  $hoy->format('d-m-Y') ) : ( isset($experiencia_laboral)? $experiencia_laboral->fecha_ini_form : $hoy->format('d-m-Y') ) }}" required  pattern="^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$" >
            @if ($errors->has('fecha_ini')) 
                @foreach ( $errors->get('fecha_ini') as $error )
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
        <a id="help-pop" tabindex="0" class="btn btn-white btn-xs btn-info btn-bold" role="button" data-toggle="popover" 
            data-placement="bottom" data-trigger="focus" title="Ayuda" data-content="Selecciona la Fecha de Finalización si la Experiencia Laboral 
            fue finalizada. En caso contrario, deja el campo vacio.(Haz Click fuera de la Ayuda para cerrarme.)">
            <span class="help-button" >?</span></a>
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
    <div class="form-group has-feedback  {{ ( $errors->has('empleador') )?   'has-error' : ''}}   ">  
        <label for="empleador" class="control-label col-sm-3"> Empleador <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="empleador" id="empleador"  placeholder="Empleador" value="{{ (Session::has('errors')) ? old('empleador', null) :  ( isset($experiencia_laboral)?  $experiencia_laboral->empleador : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
            @if ($errors->has('empleador')) 
                @foreach ( $errors->get('empleador') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('localidad') )?   'has-error' : ''}}   ">  
        <label for="localidad" class="control-label col-sm-3"> Localidad <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="localidad" id="localidad"  placeholder="Localidad" value="{{ (Session::has('errors')) ? old('localidad', null) :  ( isset($experiencia_laboral)?  $experiencia_laboral->localidad : null ) }}" required >
            @if ($errors->has('localidad')) 
                @foreach ( $errors->get('localidad') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('provincia') )?   'has-error' : ''}}   ">  
        <label for="provincia" class="control-label col-sm-3"> Provincia <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="provincia" id="provincia"  placeholder="Provincia" value="{{ (Session::has('errors')) ? old('provincia', null) :  ( isset($experiencia_laboral)?  $experiencia_laboral->provincia : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
            @if ($errors->has('provincia')) 
                @foreach ( $errors->get('provincia') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('referencia') )?   'has-error' : ''}}   ">  
        <label for="referencia" class="control-label col-sm-3"> Referencia <sup>*</sup> </label>
        <a id="help-pop" tabindex="0" class="btn btn-white btn-xs btn-info btn-bold" role="button" data-toggle="popover" 
            data-placement="bottom" data-trigger="focus" title="Ayuda" data-content="Agrega aqui el nombre de la Persona que te contrató o alguna otra Persona que te haya supervisado y pueda dar fe del buen cumplimiento de las Tareas Asignadas.
            (Haz Click fuera de la Ayuda para cerrarme.)">
            <span class="help-button" >?</span></a>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="referencia" id="referencia"  placeholder="Referencia" value="{{ (Session::has('errors')) ? old('referencia', null) :  ( isset($experiencia_laboral)?  $experiencia_laboral->referencia : null ) }}" required>
            @if ($errors->has('referencia')) 
                @foreach ( $errors->get('referencia') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback   {{ ( $errors->has('rentado') )?   'has-error' : ''}}   ">  
        <label for="rentado" class="control-label col-sm-3"> Rentado <sup>*</sup> </label>
        <a id="help-pop" tabindex="0" class="btn btn-white btn-xs btn-info btn-bold" role="button" data-toggle="popover" 
            data-placement="top" data-trigger="focus" title="Ayuda" data-content="Selecciona si las Tareas realizadas fueron compensadas con dinero, 
            o si fueron ''Ad-Honorem''(Haz Click fuera de la Ayuda para cerrarme.)">
            <span class="help-button" >?</span></a>
        <div class="">
            
            <label for="rentado_true"  class="control-label col-xs-2" style="text-align: left;" >
            
                <input name="rentado" type="radio" class="ace" id="rentado_true" value="1"
                    @if ($errors->has('rentado') )
                        @if( old('rentado') == true) checked 
                        @endif 
                    {{--  si hay experiencia laboral y no error --}}
                @elseif(  isset($experiencia_laboral  ) )
                {{--  el valor de mostrar si es Rentado --}}
                    @if( $experiencia_laboral->rentado == true )
                       checked
                    @endif
                @else
                    checked
                @endif
                    ><span class="lbl"> Si</span>
                </label>

                

            <label for="rentado_false" class="control-label col-xs-2" style="text-align: left;">
                <input name="rentado" type="radio" class="ace"  id="rentado_false" value="0"
                @if ($errors->has('rentado') )
                    @if( old('rentado') == false) checked 
                    @endif 
                {{--  si hay experiencia laboral y no error --}}
                @elseif(  isset($experiencia_laboral  ) )
                {{--  el valor de mostrar si es Rentado --}}
                    @if( $experiencia_laboral->rentado == false )
                       checked
                    @endif
                @endif    
                        ><span class="lbl"> No</span>
            </label>
            
            @if ($errors->has('rentado'))
                @foreach ( $errors->get('rentado') as $error )
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
        <a id="help-pop" tabindex="0" class="btn btn-white btn-xs btn-info btn-bold" role="button" data-toggle="popover" 
            data-placement="top" data-trigger="focus" title="Ayuda" data-content="Haz click en uno de los botones, si deseas que la Experiencia Laboral
            figure o no en tu Cv.(Haz Click fuera de la Ayuda para cerrarme.)">
            <span class="help-button" >?</span></a>
        <div class="">
            
           

            <label for="mostrar_true"  class="control-label col-xs-2" style="text-align: left;" >
            
                <input name="mostrar_cv" type="radio" class="ace" id="mostrar_true" value="1"
                    @if ($errors->has('mostrar_cv') )
                        @if( old('mostrar_cv') == true) checked 
                        @endif 
                    {{--  si hay experiencia laboral y no error --}}
                    @elseif(  isset($experiencia_laboral  ) )
                    {{--  el valor de mostrar la modalidad --}}
                        @if( $experiencia_laboral->mostrar_cv == true )
                        checked
                        @endif
                    @else
                        checked
                    @endif
                    ><span class="lbl"> Si</span>
                </label>

                

            <label for="mostrar_cv_false" class="control-label col-xs-2" style="text-align: left;">
                <input name="mostrar_cv" type="radio" class="ace"  id="mostrar_cv_false" value="0"
                @if ($errors->has('mostrar_cv') )
                    @if( old('mostrar_cv') == false) checked 
                    @endif 
                {{--  si hay experiencia laboral y no error --}}
                @elseif(  isset($experiencia_laboral  ) )
                {{--  el valor de mostrar la modalidad --}}
                    @if( $experiencia_laboral->mostrar_cv == false )
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

 
@section ('scripts')

<script>
    $(function($){

        $('#fecha_ini').data("DateTimePicker").maxDate( moment("{{ $hoy->format('Y-m-d') }}"));  
        $('#fecha_fin').data("DateTimePicker").maxDate( moment("{{ $hoy->format('Y-m-d') }}"));  
    
        @if( Session::has('errors'))
            $('#fecha_fin').val("{{ old('fecha_fin', null) }}");
        @else 
            @if( isset($experiencia_laboral))   
                $('#fecha_fin').val("{{ $experiencia_laboral->fecha_fin_form }}"); 
            @else
                $('#fecha_fin').val(null);
            @endif

        @endif 

           
    });

</script>

@endsection