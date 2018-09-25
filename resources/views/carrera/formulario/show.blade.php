
@extends("layouts.app")
@section ('title', 'Carreras: Ver')
  
@section ('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $carrera->nombre }} <small> Ver </small></h3>
        </div>

        <div class="panel-body")
            <form action="" class="form-horizontal"> 
             @include('carrera.partials.show')
            </form>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('carreras.index')}}"> Volver </a>    
            <a class="btn btn-warning" href="{{ route('carreras.edit', $carrera->id) }}"> Editar </a>    
        
        </div>
    </div>
        
    

@endsection