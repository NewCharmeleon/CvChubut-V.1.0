
<div class="row">
    <div class="form-group">  
        <label for="nombre" class="control-label col-sm-3"> Nombre </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->nombre   }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="lugar" class="control-label col-sm-3"> Lugar </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->lugar }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="fecha_inicio" class="control-label col-sm-3"> Fecha de Inicio </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->fecha_inicio_show }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="fecha_fin" class="control-label col-sm-3"> Fecha de Finalizaci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->fecha_fin_show }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="institucion" class="control-label col-sm-3"> Instituci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->institucion->nombre  }}  </p> 
        </div>
        <label for="institucion" class="control-label col-sm-3"> Ubicaci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->institucion->localidad  }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="actividad_tipo_nombre" class="control-label col-sm-3"> Tipo de Actividad </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->actividad_tipo->nombre  }}  </p> 
        </div>
        <label for="actividad_tipo_descripcion" class="control-label col-sm-3"> Descripci$oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->actividad_tipo->descripcion  }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="ambito_actividad_nombre" class="control-label col-sm-3"> &Aacute;mbito de Actividad </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->ambito_actividad->nombre }}  </p> 
        </div>
        <label for="ambito_actividad_descripcion" class="control-label col-sm-3"> Descripci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->ambito_actividad->descripcion }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="tipo_participacion_nombre" class="control-label col-sm-3"> Tipo de Participaci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->tipo_participacion->nombre }}  </p> 
        </div>
        <label for="tipo_participacion_descripcion" class="control-label col-sm-3"> Descripci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->tipo_participacion->descripcion }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="modalidad_nombre" class="control-label col-sm-3"> Modalidad </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->modalidad->nombre }}  </p> 
        </div>
        <label for="modalidad_descripcion" class="control-label col-sm-3"> Descripci&oacute;n </label>
        <div class="col-sm-8">
           <p class="text-show"> {{  $actividad->modalidad->descripcion }}  </p> 
        </div>
    </div>
</div>