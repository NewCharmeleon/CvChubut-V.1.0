@extends('layouts.appAce')

@section ('title', 'Estudiantes : ver')
  
@section ('content')

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $persona->nombre_apellido }} 
            <span class="label label-xlg label-success arrowed-right">Ver</span>
                                    </small>
                                    </h3>
        </div>
        <div class="panel-body")
                <form action="" class="form-horizontal">
                    @include('estudiante.partials.show')
                </form>
        </div>        
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ url('/') }}"> Volver</a>  
            <a class="btn btn-warning" href="{{ route('estudiantes.edit', $user->id) }}"> Editar</a>
        </div>
    </div>
       
@endsection 

@section('script')

@endsection
