@extends("layouts.appAce")
@section ('title', 'Carreras: Editar')
  
@section ('content')
    <form action="{{ route('carreras.update',$carrera->id) }}" method="POST" class="form-horizontal">
         <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $carrera->nombre }} 
               <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3>
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