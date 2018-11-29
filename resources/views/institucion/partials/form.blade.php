
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre') )?   'has-error' : ''}}   ">  
        <label for="nombre" class="control-label col-sm-3"> Nombre <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre" value="{{ (Session::has('errors')) ? old('nombre', null) :  ( isset($institucion)?  $institucion->nombre : null ) }}" required >
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
    <div class="form-group has-feedback  {{ ( $errors->has('localidad') )?   'has-error' : ''}}   ">  
        <label for="localidad" class="control-label col-sm-3"> Localidad <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="localidad" id="localidad"  placeholder="Localidad" value="{{ (Session::has('errors')) ? old('localidad', null) :  ( isset($institucion)?  $institucion->localidad : null ) }}" required >
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
            <input type="text" class="form-control" name="provincia" id="provincia"  placeholder="Provincia" value="{{ (Session::has('errors')) ? old('provincia', null) :  ( isset($institucion)?  $institucion->provincia : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
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
    <div class="form-group has-feedback  {{ ( $errors->has('pais') )?   'has-error' : ''}}   ">  
        <label for="pais" class="control-label col-sm-3"> Pais <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pais" id="pais"  placeholder="Pais" value="{{ (Session::has('errors')) ? old('pais', null) :  ( isset($institucion)?  $institucion->pais : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
            @if ($errors->has('pais')) 
                @foreach ( $errors->get('pais') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

