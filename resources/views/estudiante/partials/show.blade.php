
<div class="row">
    <div class="form-group">  
        <label for="email" class="control-label col-sm-3"> Email </label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $user->email   }}  </p> 
        </div>
    </div>
</div>

@include('usuario.partials.show')
@if( isset( $persona->carrera->nombre ) )
    <div class="row">
        <div class="form-group">  
            <label for="carrera_id" class="control-label col-sm-3"> Carrera </label>
            <div class="col-sm-6">
            <p class="text-show"> {{  $persona->carrera->nombre }}  </p> 
            </div>
        </div>
    </div>
@else
    <br>
    <p><b>El Estudiante No posee Carrera Registrada</b><p>
@endif