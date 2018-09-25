
    
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre_institucion') )?   'has-error' : ''}}   ">  
        <label for="nombre_institucion" class="control-label col-sm-3"> Nombre <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre_institucion" id="nombre_institucion"  placeholder="Nombre" value="{{ (Session::has('errors')) ? old('nombre', null) :  ( isset($institucion)?  $institucion->nombre_institucion : null ) }}" required >
            @if ($errors->has('nombre_institucion')) 
                @foreach ( $errors->get('nombre_institucion') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('localidad') )?   'has-error' : ''}}   ">  
        <label for="localidad_institucion" class="control-label col-sm-3"> Localidad <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="localidad_institucion" id="localidad_institucion"  placeholder="Localidad" value="{{ (Session::has('errors')) ? old('localidad_institucion', null) :  ( isset($institucion)?  $institucion->localidad_institucion : null ) }}" required >
            @if ($errors->has('localidad_institucion')) 
                @foreach ( $errors->get('localidad_institucion') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

{{--<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('provincia') )?   'has-error' : ''}}   ">  
        <label for="provincia_institucion" class="control-label col-sm-3"> Provincia <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="provincia_institucion" id="provincia_institucion"  placeholder="Provincia" value="{{ (Session::has('errors')) ? old('provincia_institucion', null) :  ( isset($institucion)?  $institucion->provincia_institucion : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
            @if ($errors->has('provincia_institucion')) 
                @foreach ( $errors->get('provincia_institucion') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('pais_institucion') )?   'has-error' : ''}}   ">  
        <label for="pais_institucion" class="control-label col-sm-3"> Pais <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pais_institucion" id="pais_institucion"  placeholder="Pais" value="{{ (Session::has('errors')) ? old('pais_institucion', null) :  ( isset($institucion)?  $institucion->pais_institucion : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
            @if ($errors->has('pais_institucion')) 
                @foreach ( $errors->get('pais_institucion') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>--}}
