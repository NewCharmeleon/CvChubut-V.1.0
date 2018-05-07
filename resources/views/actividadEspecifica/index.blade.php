@extends('layouts.app')

@section ('title')Actividades @stop
  
@section ('content')
<div class="panel panel-success col-md-10 col-md-offset-1">
  @include('layouts.menu')
  <br><br><br>
</div>

<div class="col-md-10 col-md-offset-1 well">
  <table class="table table-striped">
    <caption><h4><b><u>Listado de Actividades Especificas</u></b></h4></caption>
    <thead>
     <tr>
       <th>Id</th>
       <th>Tipo</th>
        <th>Nombre</th>
       <th>Desde</th>
       <th>Hasta</th>
       <th>Instancia</th>
       <th>Puesto o Mencion</th>
       <th>Institucion Oferente</th>
       <th>Institucion Referente</th>
        <th>Lugar</th>
     </tr>
    </thead>
   <tbody>
    @foreach ($actividadEspecifica as $id => $actividadEspecifica)
      <tr>
        <td>{{ $actividadEspecifica->id }}</td>
        <td>{{ $actividadEspecifica->act_id }}</td>
        <td>{{ $actividadEspecifica->nombre }}</td>
        <td>{{ $actividadEspecifica->fecha_desde }}</td>
        <td>{{ $actividadEspecifica->fecha_hasta }}</td>
        <td>{{ $actividadEspecifica->instancia}}</td>
        <td>{{ $actividadEspecifica->puesto_mencion}}</td>
        <td>{{ $actividadEspecifica->inst_referente}}</td>
        <td>{{ $actividadEspecifica->inst_oferente}}</td>
        <td>{{ $actividadEspecifica->lugar}}</td>
        <td>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Crear</button>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Editar</button>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Eliminar</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@stop


















