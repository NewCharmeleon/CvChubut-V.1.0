<nav class="navbar navbar-udc navbar-default" style="">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nab-menu-min" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="glyphicon glyphicon-home"></i>
        </a>
    </div>
    
    <div class="container-fluid">
        <div id="nab-menu-min" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                <!-- roles y accesos -->

                    @role(['Administrador'])
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('usuarios.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('usuarios.create') }}">  <i class="glyphicon glyphicon-plus"></i> Nuevo </a></li>
                            </ul>
                        </li>
                    @endrole
                    @role(['Secretaria','Administrador'])

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-education"></i> Estudiantes <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('estudiantes.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('agregar.estudiantes.show') }}">  <i class="glyphicon glyphicon-floppy-open"></i>  Agregar por archivo </a></li>
                                <li><a href="{{  route('estudiantes.create') }}">  <i class="glyphicon glyphicon-plus"></i> Nuevo </a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-blackboard"></i> Carreras <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('carreras.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('carreras.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nueva </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-th-list"></i> Tipo de Actividades <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('actividades.tipos.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('actividades.tipos.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-modal-window"></i> Modalidades <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('modalidades.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('modalidades.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-modal-window"></i> Ambitos de Actividades <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('ambitos.actividades.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('ambitos.actividades.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-blackboard"></i> Instituciones <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('instituciones.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('instituciones.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>




                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-bookmark"></i> Tipos de Participaciones <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('tipos.participaciones.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('tipos.participaciones.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>

                    @endrole

                    @role(['Estudiante'])

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-pushpin"></i> Actividades <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('actividades.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('actividades.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-briefcase"></i> Experiencias Laborales <span class="caret"></span></a>
                            <ul class="dropdown-menu link-acceso">
                                <li><a href="{{  route('experiencias.laborales.index')  }}"> <i class="glyphicon glyphicon-list-alt"></i> Listados  </a></li>
                                <li><a href="{{  route('experiencias.laborales.create') }}">  <i class="glyphicon glyphicon-plus"></i>  Nuevo </a></li>
                            </ul>
                        </li>    
                    @endrole     
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>            

                                    

