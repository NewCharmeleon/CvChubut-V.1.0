@extends("layouts.app")
@section ('title', 'Modalidades: Editar')
  
@section ('content')
    <form action="{{ route('modalidades.update', $modalidad->id) }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $modalidad->nombre }} <small> Editar </small></h3>
            </div>
            <div class="panel-body")
                <input type="hidden" name="_method" value="put">
                @include('modalidad.partials.form')
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" type="submit"> Guardar</button>
                 <a class="btn btn-primary" href="{{ route('modalidades.index')}}"> Volver </a>    
            </div>
        </div>
    </form>    
    

@endsection