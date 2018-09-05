@extends('layouts.app')

@section('title', 'Inicio')
 
@section('content')

  <div class="panel-body">
    @if (! Auth::guest() )
      <h2>
        Bienvenido !! <b>{{ Auth::user()->persona->nombre_apellido }} </b>
      <h2>  
    @else
   
      <div class="row">
        <div class="col-sm-6" style="border-right: 1px solid #000; ">
          <h3> Iniciar Sesi&oacute;n <h3>
          <!-- login -->
          @include('auth.form_login')
        </div>
        <div class="col-sm-6">
          <div style="padding-bottom: 35px;"></div>
          <!-- Texto de Bienvenido -->
          <p style="text-align: justify;">
            La trayectoria formativa de los estudiantes esta 
            conformada por actividades promocionables y no 
            promocionables, sin embargo solo las primeras son 
            formalmente acreditadas. No obstante, muchos de los
            estudiantes participan en actividades complementarias
            a&uacute;n cuando no tienen car&aacute;cter obligatorio
            sin lugar a dudas forman parte de su trayectoria formativa. 
            La Universidad del Chubut propone sumar toda esta informaci&ocute;n
            relevante al legajo de los estudiantes universitarios, de modo tal 
            que al momento de egresar y en forma simult&acute;nea con su t&iacute;tulo,
            reciba esta suerte de hoja de trayectoria y una clave de acceso para poder
            reimprimirla las veces que sea necesaria, e incluso poder editar ciertos 
            campos a medida que avanza en su formaci&ocute;n y/o trayectoria laboral. 
          </p>
          <div style="text-align: center;">
            <a href="#" class="btn btn-default" > Ingresar sin cuenta </a>
          </div>  
        </div>
      </div>  
    @endif

  </div>
   
@endsection

