
@extends("layouts.app")
@section ('title', 'Modalidades: Ver')
  
@section ('content')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ $modalidad->nombre }} <small> Ver </small></h3>
        </div>

        <div class="panel-body")
            <form action="" class="form-horizontal"> 
             @include('modalidad.partials.show')
            </form>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ route('modalidades.index')}}"> Volver </a>    
            <a class="btn btn-warning" href="{{ route('modalidades.edit', $modalidad->id) }}"> Editar </a>    
        
        </div>
    </div>
        
    

@endsection