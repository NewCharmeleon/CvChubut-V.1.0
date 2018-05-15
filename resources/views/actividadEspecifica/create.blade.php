@extends('layouts.app')

@section ('title')Crear Actividades @stop

@section('content')

<div class="panel panel-success col-md-10 col-md-offset-1">
	<div>	
  	@include('layouts.menu')
  	</div>
	<br><br><br><br><br><br>
	<div class="panel-heading col-md-10 col-md-offset-1">
   		<h3 class="panel-title">Crear Actividades:</h3>
	</div>
	<div class="panel-body">
		<form action="{{ route('actividadesEspecifica.store') }}" method="post" role="form">
    		@include('actividadEspecifica.partials.form')
			</form> 
	</div>
	<div class="panel-footer col-md-10 col-md-offset-1">
   		<div class="btn-group" role="group">
    		<button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('Crear') }}</button>
   			 <a class="btn btn-labeled btn-default" href="{{ route('actividadesEspecifica.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('Cancelar') }}</a>
		</div>
	</div>
</div>
@endsection