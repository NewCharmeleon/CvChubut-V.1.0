 <!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="{{ url('/') }}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Inicio </span>
						</a>

						<b class="arrow"></b>
					</li>

                     @role(['Administrador'])           
					<li class="active">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-users "></i>
							<span class="menu-text">
								Usuarios
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{  route('usuarios.index')  }}">
									<i class="menu-icon fa fa-caret-right"></i>

									Listado
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								
							</li>

							<li class="">
								<a href="{{  route('usuarios.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nuevo
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
                    </li>
                    @endrole
                    @role(['Secretaria','Administrador'])

                               
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-education"></i>
							<span class="menu-text"> Estudiantes </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{  route('estudiantes.index')  }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{  route('estudiantes.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nuevo
								</a>

								<b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="{{  route('agregar.estudiantes.show') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Agregar por archivo
                                </a>

                                <b class="arrow"></b>
                            </li>
						</ul>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon glyphicon glyphicon-blackboard"></i>
							<span class="menu-text"> Carreras </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{  route('carreras.index')  }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{  route('carreras.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nueva
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="material-icons">&#xe7f1;</i> 
                            	<span class="menu-text"> Instituciones </span>
						<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{  route('instituciones.index')  }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{  route('instituciones.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nueva
								</a>

								<b class="arrow"></b>
							</li>
                            
						</ul>
                    </li>
					
    				<li class="">
						<a href="#" class="dropdown-toggle" style="height: 55px">
							<i class="menu-icon glyphicon glyphicon-globe"></i>
							<span class="menu-text"> &Aacute;mbitos de Actividades </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{  route('ambitos.actividades.index')  }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{  route('ambitos.actividades.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nueva
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
                   
					<li class="">
						<a href="#" class="dropdown-toggle" style="height: 55px">
							<i class="menu-icon glyphicon glyphicon-list"></i>

							<span class="menu-text">
                                    Tipos de Actividades

								<!--span class="badge badge-primary">5</span-->
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{  route('actividades.tipos.index')  }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{  route('actividades.tipos.create') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nueva
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
                    </li>
                    
                                      
                    <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-briefcase "></i>
    
                                <span class="menu-text">
                                        Modalidades
    
                                    <!--span class="badge badge-primary">5</span-->
                                </span>
    
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
    
                            <b class="arrow"></b>
    
                            <ul class="submenu">
                                <li class="">
                                    <a href="{{  route('modalidades.index')  }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Listado
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                <li class="">
                                    <a href="{{  route('modalidades.create') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Nueva
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                
                            </ul>
                        </li>
                       
                        <li class="">
                            <a href="#" class="dropdown-toggle" style="height: 55px">
                                <i class="material-icons">accessibility</i>
                                <span class="menu-text">
                                        Tipos de Participaciones
    
                                    <!--span class="badge badge-primary">5</span-->
                                </span>
    
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
    
                            <b class="arrow"></b>
    
                            <ul class="submenu">
                                <li class="">
                                    <a href="{{  route('tipos.participaciones.index')  }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Listado
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                <li class="">
                                    <a href="{{  route('tipos.participaciones.create') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Nueva
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                
                            </ul>
                        </li>
                        @endrole
                        @role(['Estudiante'])
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon glyphicon glyphicon-blackboard"></i>
    
                                <span class="menu-text">
                                        Tu Carrera
    
                                    <!--span class="badge badge-primary">5</span-->
                                </span>
    
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
    
                                <b class="arrow"></b>
    
                            <ul class="submenu">
                                <li class="">
                                    <a href="{{  route('carrera.perfil')   }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Ver Carrera
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                <li class="">
                                    <a href="{{  route('carrera.perfil.edit') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Editar cantidad de Materias Aprobadas
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                
                            </ul>
                        </li>
                                      
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="material-icons">assignment</i>
    
                                <span class="menu-text">
                                        Tus Actividades
    
                                    <!--span class="badge badge-primary">5</span-->
                                </span>
    
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
    
                            <b class="arrow"></b>
    
                            <ul class="submenu">
                                <li class="">
                                    <a href="{{  route('actividades.index')  }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Listado
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                <li class="">
                                    <a href="{{  route('actividades.create') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Nueva
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="material-icons">work</i>
    
                                <span class="menu-text">
                                        Tus Experiencias Laborales
    
                                    <!--span class="badge badge-primary">5</span-->
                                </span>
    
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
    
                            <b class="arrow"></b>
    
                            <ul class="submenu">
                                <li class="">
                                    <a href="{{  route('experiencias.laborales.index')  }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Listado
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                <li class="">
                                    <a href="{{  route('experiencias.laborales.create') }}">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                        Nueva
                                    </a>
    
                                    <b class="arrow"></b>
                                </li>
    
                                
                            </ul>
                        </li>
                        @endrole
				</ul><!-- /.nav-list -->