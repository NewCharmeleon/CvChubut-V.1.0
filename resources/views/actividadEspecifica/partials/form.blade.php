<input type="hidden" name="_token" value="{{ csrf_token() }}">


      
<div class="form-group col-md-8 col-md-offset-2">
    <label for="nombre">Nombre</label>
    <input type="input" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{ (Session::has('errors')) ? old('nombre', '') : $actividadEspecifica->nombre }}">
</div>   
<div class="form-group col-md-8 col-md-offset-2">
    <label for="fechaDesde">Fecha de Inicio</label>
    <input type="input" class="form-control" id="fechaDesde" placeholder="Fecha de Inicio" name="fechaDesde" value="{{ (Session::has('errors')) ? old('fechaDesde', '') : $actividadEspecifica->fecha_desde }}">
</div>     
<div class="form-group col-md-8 col-md-offset-2">
    <label for="fechaFin">Fecha de Fin</label>
    <input type="input" class="form-control" id="fechaFin" placeholder="Fecha de Fin" name="fechaFin" value="{{ (Session::has('errors')) ? old('fechaFin', '') : $actividadEspecifica->fecha_hasta }}">
</div>   
 <div class="form-group col-md-8 col-md-offset-2">
    <label for="instancia">Instancia</label>
    <input type="input" class="form-control" id="instancia" placeholder="Instancia" name="instancia" value="{{ (Session::has('errors')) ? old('instancia', '') : $actividadEspecifica->instancia }}">
</div>      
<div class="form-group col-md-8 col-md-offset-2">
    <label for="puestoMencion">Puesto o Mencion</label>
    <input type="input" class="form-control" id="puestoMencion" placeholder="Puesto/Mencion" name="puestoMencion" value="{{ (Session::has('errors')) ? old('puestoMencion', '') : $actividadEspecifica->puesto_mencion }}">
</div>
<div class="form-group col-md-8 col-md-offset-2">
    <label for="referente">Institucion Referente</label>
    <input type="input" class="form-control" id="referente" placeholder="Institucion Referente" name="referente" value="{{ (Session::has('errors')) ? old('referente', '') : $actividadEspecifica->inst_referente }}">
</div>
<div class="form-group col-md-8 col-md-offset-2">
    <label for="oferente">Institucion Oferente</label>
    <input type="input" class="form-control" id="oferente" placeholder="Institucion Oferente" name="oferente" value="{{ (Session::has('errors')) ? old('oferente', '') : $actividadEspecifica->inst_oferente }}">
</div>
<div class="form-group col-md-8 col-md-offset-2">
    <label for="lugar">Lugar</label>
    <input type="input" class="form-control" id="lugar" placeholder="Lugar" name="lugar" value="{{ (Session::has('errors')) ? old('lugar', '') : $actividadEspecifica->lugar }}">
</div>



