<nav class="navbar navbar-default navbar-static-top nav-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->

                    @if(! Auth::guest() )
                    <button type="button" class="navbar-toggle" id="menu-minimizado" data-target="#nab-perfil-min">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @endif

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div>
                            <img src="{{ asset('imagenes/logo-navbar.png') }}" id="logo" alt="logo universidad">
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav" style="margin-left:7%;">
                       @if (!Auth::guest())
                            <li>
                                <div style="min-width: 200px;">
                                    <div style="text-align: center; padding-top:10px; padding-bottom:10px;">
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
                        @endif 
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            
                        @else
                       
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    
                                    <div style="height: 80px; ">
                                        <img src="{{ asset('avatars/default-avatar.png') }}" alt="avatar" class="avatar" id="avatar">
                                            <span class="caret"></span>
                                    </div>
                                </a>            
                                    
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>