@extends('layouts.app')

@section('content')
{{$rol=''}}
<span class=”glyphicon glyphicon-star”></span>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div>@yield('menu')</div>


          <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/actividadesTipo') }}"> <i class="glyphicon glyphicon-education"></i>Tipo de Actividades</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/actividades') }}"><i class="glyphicon glyphicon-education"></i>Actividades Generales</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/actividadesTipo') }}"> <i class="glyphicon glyphicon-education"></i>Actividades Especificas</a>
          </div>
        </div>

        </div>
        <hr>
        <div class="panel-body">
        <hr>
                  Bienvenido {{$rol}}!
                    <div class="">
                      <h2>  @if(! Auth::guest() )
                        <div>
                         {{ Auth::user()->username }}
                         {{ Auth::user()->role}}
                        </div>
                      @endif
                    </h2>
                    </div>
                    <a class="link btn btn-default" href="{{ route('usuarios.index') }}"> <i class="glyphicon glyphicon-edit"></i>Editar Usuarios</a>
                    <div class="" id="load-view">

                    </div>
                      <img src=  {{ asset('imagenes/logoUDC.png') }}>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(function ($) {

    $('a.link').click(function(e) {
      e.preventDefault();

      $.get( e.target.href,function (response) {
        $('#load-view').html(response);
      });

    });




  });
</script>
@endsection
