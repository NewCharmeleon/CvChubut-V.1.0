
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('nombre') )?   'has-error' : ''}}   ">  
        <label for="nombre" class="control-label col-sm-3"> Nombre <sup>*</sup> </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre" value="{{ (Session::has('errors')) ? old('nombre', null) :  ( isset($actividad_tipo)?  $actividad_tipo->nombre : null ) }}" required pattern="^[a-zA-Z_áéíóúñ\s]*$">
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
    <div class="form-group has-feedback  {{ ( $errors->has('descripcion') )?   'has-error' : ''}}   ">  
        <label for="nombre" class="control-label col-sm-3"> Descripci&oacute;n </label>
        <div class="col-sm-6">
           <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripci&oacute;n">{{  ( Session::has('errors') ) ?  old('descripcion', null ) : ( isset($actividad_tipo)?  $actividad_tipo->descripcion : null )   }}</textarea>
            @if ($errors->has('descripcion')) 
                @foreach ( $errors->get('descripcion') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>  

