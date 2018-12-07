{!!  csrf_field()  !!}

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre_apellido') )?   'has-error' : ''}}   ">  
        <label for="nombre_apellido" class="control-label col-sm-3"> Nombre y Apellido <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre_apellido" id="nombre_apellido"  placeholder="Nombre Apellido " value="{{ (Session::has('errors')) ? old('nombre_apellido', '') :  ( isset($persona)?  $persona->nombre_apellido : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
            @if ($errors->has('nombre_apellido')) 
                @foreach ( $errors->get('nombre_apellido') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group   {{ ( $errors->has('dni') )?   'has-error' : ''}}   ">  
        <label for="dni" class="control-label col-sm-3"> D.N.I <sup>*</sup></label>
        <div class="col-sm-6">
            <input type="text" class="form-control dni" name="dni" id="dni"  placeholder="99.999.999" value="" required pattern="\d{2}[.]\d{3}[.]\d{3}">
            @if ($errors->has('dni')) 
                @foreach ( $errors->get('dni') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group   {{ ( $errors->has('fecha_nac') )?   'has-error' : ''}}   ">  
        <label for="fecha_nac" class="control-label col-sm-3"> Fecha Nacimiento *</label>
        <div class="col-sm-6">
            <input type="text" class="form-control date" name="fecha_nac" id="fecha_nac" placeholder="dd-mm-aaaa" value="{{ (Session::has('errors')) ? old('fecha_nac', '') : ( isset($persona)? $persona->fecha_nacimiento : null ) }}" required  pattern="^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$"  >
            @if ($errors->has('fecha_nac')) 
                @foreach ( $errors->get('fecha_nac') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group   {{ ( $errors->has('nacionalidad') )?   'has-error' : ''}}   ">  
        <label for="nacionalidad" class="control-label col-sm-3"> Nacionalidad </label>
        <div class="col-sm-6">
            <select name="nacionalidad" id="" placeholder="Nacionalidades" class="form-control">
                
                @foreach ($nacionalidades as  $nacionalidad)
                    
                    <option value="{{ $nacionalidad }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona la ultima nacionalidad --}}
                        @if ( old('nacionalidad', 'n/c') == $nacionalidad)
                                selected
                        @endif

                    @else 
                    {{--  si hay persona y no error --}}
                        @if(  isset($persona  ) )
                            @if( empty($persona->nacionalidad )     )
                                @if( $nacionalidad == 'n/c' )
                                    selected
                                @endif
                            @else
                                {{--  el valor de la persona --}}
                                @if( $nacionalidad == $persona->nacionalidad )
                                    selected
                                @endif
                            @endif

                            
                        @endif

                    @endif
                    
                    >   {{  $nacionalidad }} </option>

                @endforeach
            
            
            </select>
             @if ($errors->has('nacionalidad')) 
                @foreach ( $errors->get('nacionalidad') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group   {{ ( $errors->has('telefono') )?   'has-error' : ''}}   ">  
        <label for="telefono" class="control-label col-sm-3"> Telefono </label>
        <div class="col-sm-6">
            <input type="text" class="form-control telefono" name="telefono" id="telefono" placeholder="(999)999-9999" value="" pattern="^[(]\d{3}[)]\d{3}[-]\d{4}$">
             @if ($errors->has('telefono')) 
                @foreach ( $errors->get('telefono') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>


