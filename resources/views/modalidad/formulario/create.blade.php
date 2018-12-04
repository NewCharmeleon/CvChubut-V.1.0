
@extends("layouts.appAce")
@section ('title', 'Modalidades: Nueva')
  
@section ('content')
    <form action="{{ route('modalidades.store') }}" method="POST" class="form-horizontal">

         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Modalidades <i class="ace-icon fa fa-angle-double-right"></i>
									<span class="label label-xlg label-primary arrowed-right">Nueva</span>
                                    </small>
                                    </h3>
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