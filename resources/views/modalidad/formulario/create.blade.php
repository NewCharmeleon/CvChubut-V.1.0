
@extends("layouts.app")
@section ('title', 'Modalidades: Nueva')
  
@section ('content')
    <form action="{{ route('modalidades.store') }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Modalidades <small> Nueva </small></h3>
            </div>
            <div class="panel-body")
                @include('modalidad.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('modalidades.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection