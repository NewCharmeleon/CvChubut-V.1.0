
@extends("layouts.app")
@section ('title', 'Carreras: Nuevo')
  
@section ('content')
    <form action="{{ route('carreras.store') }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Carrera <small> Nueva </small></h3>
            </div>
            <div class="panel-body")
                @include('carrera.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('carreras.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection