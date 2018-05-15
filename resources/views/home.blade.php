@extends('layouts.app')

@section('content')
{{$rol=''}}
<div class="panel panel-warning col-md-10 col-md-offset-1">
  
    
    @include('layouts.menu')
   <br> <br><br>
  </div>
  <div class="panel-body">
      <h2>  @if(! Auth::guest() )
              Bienvenido {{$rol}}!{{ Auth::user()->username }}
            {{ Auth::user()->getRole}}</h2>
                @endif
  </div>
       <a class="link btn btn-default" href="{{ route('usuarios.index') }}"> <i class="glyphicon glyphicon-edit"></i>Editar Usuarios</a>
  <div>  <img src=  {{ asset('imagenes/logoUDC.png') }}>
  </div>
  </div>
</div>

  
@endsection

