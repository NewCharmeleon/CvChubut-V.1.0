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
           </h2>
         @endif
</div>
<div>  
  <img src=  {{ asset('imagenes/logoUDC.png') }}>
</div>
  
  
@endsection

