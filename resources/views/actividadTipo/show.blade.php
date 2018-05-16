@extends('layouts.app')

@section ('title')Ver Actividad @stop

@section('content')

<div class="panel panel-success col-md-10 col-md-offset-1">
    <div>   
    @include('layouts.menu')
    </div>
    <br>
    <div class="panel-heading col-md-8 col-md-offset-2">
        <h3 class="panel-title">Ver Actividad:</h3>
    </div>
    <div class="panel-body col-md-8 col-md-offset-2">
            <div>
            <strong>Tipo:</strong>
            {{ $actividadEspecifica->tipo }}
            </div>
            <div>

                <strong>Nombre:</strong>
                {{ $actividadEspecifica->nombre }}
            </div>
    </div>
    <div class="panel-footer col-md-8 col-md-offset-2">
        <a class="btn btn-primary" href="{{ route('actividadesEspecifica.index') }}"> Volver</a>
    </div>
    
@endsection