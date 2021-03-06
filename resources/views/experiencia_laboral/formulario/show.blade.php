@extends('layouts.appAce')
@section('title','Experiencias Laborales: ver')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">
             <h3 class="panel-title">  Experiencia Laboral de <b>{{ $persona->nombre_apellido  }} </b>  puesto <b> {{ $experiencia_laboral->puesto }} </b>  
             <span class="label label-xlg label-success arrowed-right">Ver</span>
                                    </small>
                                    </h3>
        </div>

        <div class="panel-body">
            <form action="" class="form-horizontal">
                @include('experiencia_laboral.partials.show')
            </form>
        </div>

        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('experiencias.laborales.index') }}"> Volver</a>
            <a class="btn btn-warning" href="{{ route('experiencias.laborales.edit',$experiencia_laboral->id) }}"> Editar</a>
        </div>

    </div>    

@endsection
