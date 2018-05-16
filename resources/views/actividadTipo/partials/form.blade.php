<input type="hidden" name="_token" value="{{ csrf_token() }}">


      
  
<div class="form-group col-md-8 col-md-offset-2">
    <label for="nombre">Nombre</label>
    <input type="input" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{ (Session::has('errors')) ? old('nombre', '') : $actividadTipo->nombre }}">
</div>     
<div class="form-group col-md-8 col-md-offset-2">
    <label for="descripcion">Descripcion</label>
    <input type="input" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion" value="{{ (Session::has('errors')) ? old('descripcion', '') : $actividadTipo->descripcion }}">
</div>   
 



