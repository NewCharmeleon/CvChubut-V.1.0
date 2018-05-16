@extends('layouts.app')

@section ('title')Ver Tipos de Actividades @stop

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-success">
        <div>   
            @include('layouts.menu')
        </div>
        <br>
        <div class="panel-heading">
           <h3 class="panel-title">Ver Actividad:</h3>
        </div>
        <div class="panel-body">
            <div>
                 <strong>Id:</strong>
                     {{ $actividadTipo->id }}
            </div>
            <div>
                <strong>Tipo:</strong>
                    
            </div>
            <div>
                <strong>Nombre:</strong>
                    {{ $actividadTipo->nombre }}
            </div>
            <div>
                <strong>Descripcion:</strong>
                   {{ $actividadTipo->descripcion }}
            </div>

    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="{{ route('actividadesTipo.index') }}"> Volver</a>
    </div>
</div>    
@endsection