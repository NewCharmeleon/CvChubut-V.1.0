<div id="navbar" class="navbar navbar-default          ace-save-state">
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
                            <img src="{{ asset('imagenes/logo-navbar.png') }}" id="logo" alt="logo universidad">
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
                                         <b>Sistema de Gesti&oacute;n de Actividades no Promocionables</b>
                                        </div>

                                    </div>
                                </li> 
                            @endif
                        
                    </ul>
				<div class="navbar-buttons navbar-header pull-right" style="margin-top:3%;" role="navigation">
                
					<ul class="nav ace-nav">
						<!--li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li-->

						<!--li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li-->

						<!--li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li-->

                        
                       
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
								<img class="nav-user-photo" src="{{ asset('avatars/default-avatar.png') }}" alt="Jason's Photo" />
								<span class="user-info" style="max-width: 100%;">
									<small>Bienvenido,</small>
									{{ Auth::user()->username }}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Configuraci&oacute;n
									</a>
								</li>

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
                                <li class="divider"></li>

                                <li><a href="/">Inicio</a></li>
                                <li>
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Paginas</a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li><a href="#">Pagina</a></li>
                                        <li><a href="#">Pagina</a></li>
                                        <li><a href="#">Pagina</a></li>
                                    </ul>
                                </li>
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

