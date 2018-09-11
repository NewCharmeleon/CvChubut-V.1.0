

<div class="row">
    <div class="form-group">  
        <label for="nombre" class="control-label col-sm-3"> Nombre y Apellido</label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $persona->nombre_apellido   }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="dni" class="control-label col-sm-3"> D.N.I.</label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $persona->dni }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="fecha_nac" class="control-label col-sm-3"> Fecha de Nacimiento</label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $persona->fecha_nacimiento }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="nacionalidad" class="control-label col-sm-3"> Nacionalidad</label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $persona->nacionalidad }}  </p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">  
        <label for="telefono" class="control-label col-sm-3"> Telefono</label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $persona->telefono  }}  </p> 
        </div>
    </div>
</div>