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
          <div class="mbr-section-btn pull-right">
            <a href="{{ route('actividadesEspecifica.show',$actividadEspecifica->id) }}" > <i class="glyphicon glyphicon-eye-open"></i> </a>
             </td>
             <td>
                <a href="{{ route('actividadesEspecifica.edit',$actividadEspecifica->id) }}" alt="Editar Publicacion"> <i class="glyphicon glyphicon-edit" ></i> </a>
              </td>
              <td>
                <a href="{{ route('actividadesEspecifica.destroy',$actividadEspecifica->id) }}" alt="Eliminar Publicacion"> <i class="glyphicon glyphicon-trash"></i> </a>
              </td>
    @endforeach
  </tbody>
</table>
</div>
@stop


















