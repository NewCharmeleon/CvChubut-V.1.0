


@yield('campo_extra')

@include('carrera.partials.show')  <br><br><br>
<div class="row">
    <div class="form-group">  
        <label for="" class="control-label col-sm-3"> Cantidad de Materias Aprobadas </label>
        <div class="col-sm-6">
           <p class="text-show"> {{  $carrera->materias_aprobadas  }}  </p> 
        </div>
    </div>
</div>