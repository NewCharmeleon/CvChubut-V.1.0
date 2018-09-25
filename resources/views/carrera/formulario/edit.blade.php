@extends("layouts.app")
@section ('title', 'Carreras: Editar')
  
@section ('content')
    <form action="{{ route('carreras.update', $carrera->id) }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $carrera->nombre }} <small> Editar </small></h3>
            </div>
            <div class="panel-body")
                <input type="hidden" name="_method" value="put">
                @include('carrera.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('carreras.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection