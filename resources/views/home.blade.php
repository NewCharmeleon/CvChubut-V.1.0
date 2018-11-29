@extends('layouts.app')

@section('title', 'Inicio')
 
@section('content')

  <div class="panel-body">
  <br><br>
    @if (! Auth::guest() )
      <h3>
       <b> Bienvenido 
          <a href="{{ route('perfil') }}" >
          {{ Auth::user()->persona->nombre_apellido }} </b>
          </a>
        </b> <span class="label label-info arrowed arrowed-in-right">{{ Auth::user()->rol_object->name }}</span>
         
        <br>
        <h1>
								Tablero de Gesti&oacute;n Sistema CvChubut
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Inicio
								</small>
							</h1>
        <small> <b>Tablero de Gesti&oacute;n del Sistema Cv-Chubut de la Universidad del Chubut</b>
        </small>
      </h3> 
      @role(['Estudiante'])
        @include('actividad.partials.content')
      @endrole

      @role(['Administrador', 'Secretaria'])

        <div class="alert alert-info">
          <h4>
            {{ Auth::user()->rol_object->description }}
          </h4>
        </div>

        <div style="text-align:center;opacity: 0.1;">
          <img src="{{ asset('imagenes/logo-navbar.png') }}" width="650px">
        </div> 
      @endrole     
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
            <!--A verificar
            <a href="#" class="btn btn-default" > Ingresar sin cuenta </a>
            -->
          </div>  
        </div>
      </div>  
    @endif

  </div>
   
@endsection

