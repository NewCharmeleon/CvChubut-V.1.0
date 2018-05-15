@extends('layouts.app')

@section ('title')Editar Actividades @stop

@section('content')
<div class="panel panel-success col-md-10 col-md-offset-1">
	<div>	
  	@include('layouts.menu')
  	</div>
	<br>
	<div class="panel-heading col-md-10 col-md-offset-1">
   		<h3 class="panel-title">Editar Actividades:</h3>
	</div>
	<div class="panel-body">
<form action="{{ route('actividadesEspecifica.edit',$actividadEspecifica->id) }}" method="post" role="form">
<input type="hidden" name="_method" value="put">
  @include('actividadEspecifica.partials.form')
</form>  
 </div>
	<div class="panel-footer col-md-10 col-md-offset-1">
   		<div class="btn-group" role="group">
  <button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>{{ trans('Guardar') }}</button>
  <a class="btn btn-labeled btn-default" href="{{route('actividadesEspecifica.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('Cancelar') }}</a>

</div>
	</div>
</div>
@endsection