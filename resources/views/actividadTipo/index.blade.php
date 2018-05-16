@extends('layouts.app')

@section ('title')Tipo de Actividades @stop
  
@section ('content')
<div class="col-md-10 col-md-offset-1">
  <div class="panel panel-success ">
    <div>
     @include('layouts.menu')
    </div> 
  <br><br><br>
    <div class="col-md-10 col-md-offset-1 well">
      <table class="table table-striped">
        <caption><h4><b><u>Listado de Actividades Especificas</u></b></h4></caption>
        <thead>
         <tr>
             <th>Id</th>
             <th>Tipo</th>
             <th>Nombre</th>
             <th>Descripci&oacute;n</th>
         </tr>
        </thead>
        <tbody>
           @foreach ($actividadTipo as $id => $actividadTipo)
          <tr>
             <td>{{ $actividadTipo->id }}</td>
             <!--<td>{{ $actividadTipo->act_id }}</td>-->
             <td>{{ $actividadTipo->nombre }}</td>
             <td>{{ $actividadTipo->descripcion }}</td>
             <td>
                <div class="mbr-section-btn pull-right">
                  <a href="{{ route('actividadesTipo.show',$actividadTipo->id) }}" > <i class="glyphicon glyphicon-eye-open"></i> </a>
             </td>
             <td>
                <a href="{{ route('actividadesTipo.edit',$actividadTipo->id) }}" alt="Editar Publicacion"> <i class="glyphicon glyphicon-edit" ></i></a>
             </td>
             <td>
                <a href="{{ route('actividadesTipo.destroy',$actividadTipo->id) }}" alt="Eliminar Publicacion"> <i class="glyphicon glyphicon-trash"></i> </a>
             </td>
          </tr>  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop


















