<div id="navbar" class="navbar navbar-default  ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-rigth " id="menu-minimizado" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
                <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <div>
                    <img src="{{ asset('imagenes/logo-navbar.png') }}" id="logo" alt="logo universidad" style="width:247px;">
                </div>
            </a>
        </div>
               
    <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav label label-xlg label-ligth  arrowed-in arrowed-in-right" style="margin-left:7%;margin-top:3%;">
            @if (!Auth::guest())
                <li>
                    <div style="min-width: 200px;">
                        <div style="text-align: center;  padding-bottom:5%;">
                            <i class="glyphicon glyphicon-education"></i><b> {{ Auth::user()->persona->nombre_apellido }} </b>
                        </div>

                        <div>
                            <p> @if(Auth::user()->hasRole('Estudiante'))
                                        @if( isset( Auth::user()->persona->carrera->nombre ))
                                        {{ Auth::user()->persona->carrera->nombre }} 
                                        @endif 
                                @endif </p> 
                            <p> {{ Auth::user()->email }}</p>
                        </div>

                    </div>
                </li>    
                @else
                <li>
                        <div style="min-width: 200px;">
                            <div style="text-align: center;  padding-bottom:5%;">
                                <i class="glyphicon glyphicon-briefcase"></i><b> CvChubut </b>
                            </div>

                            <div>
                                <b>Sistema de Gesti&oacute;n de Actividades No Formales</b>
                            </div>

                        </div>
                    </li> 
                @endif
            
        </ul>
        <div class="navbar-buttons navbar-header pull-right" style="margin-top:3%;" role="navigation">
        
            <ul class="nav ace-nav">
                
                
            
                <li class="dropdown" >
                                
                        
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('perfil') }}">
                                <i class="glyphicon glyphicon-user"></i> Informaci&oacute;n Personal
                            </a>

                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="glyphicon glyphicon-log-out"></i>
                                    Cerrar sesi&oacute;n
                            </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    </ul>
                </li>
                
                <!-- Authentication Links -->
                @if (Auth::guest())
                    
                @else
                <li class="light-blue dropdown-modal" >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{ asset('avatars/avatar4.png') }}" alt="Jason's Photo" />
                        <span class="user-info" style="max-width: 100%;">
                            <small>Bienvenido,</small>
                            {{ Auth::user()->username }}
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <!--li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Configuraci&oacute;n
                            </a>
                        </li-->

                        <li>
                        
                            <a href="{{ route('perfil') }}">
                                <i class="ace-icon fa fa-user"></i>
                                Informaci&oacute;n Personal
                                
                            </a>
                        </li>

                        
                        <li>
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                    Cerrar sesi&oacute;n
                            </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                        <!--li class="divider"></li>

                        <li><a href="/">Inicio</a></li>
                        <li>
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Paginas</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li><a href="#">Pagina</a></li>
                                <li><a href="#">Pagina</a></li>
                                <li><a href="#">Pagina</a></li>
                            </ul>
                        </li-->
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        
    </div>
    <!-- /.navbar-container -->
    
</div>

@section('scripts')
<!-- ace scripts -->
		<script src="{{  asset('assets/js/ace-elements.min.js') }}"></script>
		<script src="{{  asset('assets/js/ace.min.js') }}"></script>
<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="{{  asset('assets/js/jquery-ui.custom.min.js') }}"></script>
		<script src="{{  asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
		<script src="{{  asset('assets/js/jquery.easypiechart.min.js') }}"></script>
		<script src="{{  asset('assets/js/jquery.sparkline.index.min.js') }}"></script>
		<script src="{{  asset('assets/js/jquery.flot.min.js') }}"></script>
		<script src="{{  asset('assets/js/jquery.flot.pie.min.js') }}"></script>
		<script src="{{  asset('assets/js/jquery.flot.resize.min.js') }}"></script>        
@endsection

