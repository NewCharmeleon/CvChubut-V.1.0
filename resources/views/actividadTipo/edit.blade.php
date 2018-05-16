@extends('layouts.app')

@section ('title')Editar Tipo de Actividades @stop

@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-success ">
		<div>	
  		@include('layouts.menu')
  		</div>
		<br>
		<div class="col-md-10 col-md-offset-1">
			<div class="panel-heading ">
   				<h3 class="panel-title">Editar Tipo de Actividades:</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('actividadesTipo.edit',$actividadTipo->id) }}" method="post" role="form">
					<input type="hidden" name="_method" value="put">
 					 @include('actividadTipo.partials.form')
				</form>  
 			</div>
 			<div class="panel-footer ">
   				<div class="btn-group" role="group">
  					<button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>{{ trans('Guardar') }}</button>
  						<a class="btn btn-labeled btn-default" href="{{route('actividadesTipo.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('Cancelar') }}</a>
				</div>
			</div>
	</div>		
</div>
@endsection