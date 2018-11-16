
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre') )?   'has-error' : ''}}   ">  
        <label for="nombre" class="control-label col-sm-3"> Nombre <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre" value="{{ (Session::has('errors')) ? old('nombre', null) :  ( isset($carrera)?  $carrera->nombre : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
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
    <div class="form-group has-feedback  {{ ( $errors->has('cantidad_materias') )?   'has-error' : ''}}   ">  
        <label for="cantidad_materias" class="control-label col-sm-3"> Cantidad de Materias </label>
        <div class="col-sm-6">
           <input type="text" name="cantidad_materias" id="cantidad_materias" class="form-control integer-positivo" placeholder="Cantidad de Materias" value="{{  ( Session::has('errors') ) ?  old('cantidad_materias', null ) : ( isset($carrera)?  $carrera->cantidad_materias : null )   }}" required pattern="[0-9]{1,4}">
            @if ($errors->has('cantidad_materias')) 
                @foreach ( $errors->get('cantidad_materias') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>  