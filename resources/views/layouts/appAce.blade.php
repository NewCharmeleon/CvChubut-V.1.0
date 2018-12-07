<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		
        <!--Favicon de la Uni-->
        <link rel="icon" href="{{asset('favicon.png') }}" sizes="16x16">
        <link rel="icon" href="{{asset('favicon.png') }}" sizes="32x32">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

         <!--Titulo-->
         <title>{{ config('app.name') }} | @yield('title')</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/font-awesome-4-5-0.min.css') }}" />
    
		<!-- page specific plugin styles -->
         <!-- Bootstrap CSS -->
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/font-awesome/font-awesome.min.css') }}" />
    <!-- Fonts -->
    
    <!-- Plugins -->
     <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/template/picnic.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/template/plugins.min.css') }}" >
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap-switch.css') }}">
    
    

		<!-- text fonts -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
    
		<script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
        <![endif]-->
       <style>
        .nav-list > li > a {
            line-height: 17px;
            text-shadow: none !important;
            font-size: 13px;
            text-align: left;
        }
        .navbar .navbar-nav > li {
            border: 0px !important;
            border-width: 0 !important;
        }    
        .label, [data-tooltip]::after, button, .button, [type="submit"], .dropimage {
            display: inline-block;
            text-align: center;
            margin: 0;
            padding: .3em .9em;
            vertical-align: middle;
            background-color: #2fc9d580;
            border: 0;
            border-radius: .2em;
            width: auto;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        /*.footer .footer-inner .footer-content {
            position: absolute;
            left: 12px;
            right: 12px;
            bottom: 4px;
            padding: 8px;
            line-height: 36px;
            border-top: 3px double #E5E5E5;
            margin-top: 10%;
        }*/
        thead:before, thead:after { display: none; } 
        tbody:before, tbody:after { display: none; } 
        .main-content {
            min-height: 80%;
            /* igual al largo del footer */
            margin-bottom: -150px;
            }

        /*footer {
        height: 150px;
        background-color: #08B;
        }*//*.main-content, body, html {
                    min-height: 100%;
                }*/
        html,body{

            margin:0px;

            height:100%;

        }
        
       </style>
	</head>

	<body class="no-skin">
         <header>
        @include('layouts.navbarAce')
        
        </header>
    
    
		<section class="main-container ace-save-state" id="main-container" style="width:100%; height:100%;position:absolute;">
			<script type="text/javascript">
				//try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebarAce" class="sidebar responsive">
				<script type="text/javascript">
					//try{ace.settings.loadState('sidebarAce')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success" disabled>
							<i class="ace-icon fa fa-signal" ></i>
						</button>

						<button class="btn btn-info" disabled>
							<i class="ace-icon fa fa-pencil" ></i>
						</button>

						<button class="btn btn-warning" disabled>
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger" disabled>
							<i class="ace-icon fa fa-cogs" ></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
                    </div>
                    @if(! Auth::guest() )
                        @include('layouts.accesos_rolesAce')
                    @endif 
                </div>
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" ></i>
                </div>
            </div> 
               
            <div class="main-content">
                    <div class="main-content-inner">
                            @yield('content')
                        
                    </div>
            </div> 
        
            <br><br><br><br><br><br>
            <footer class="footer responsive" style="/*! float:left; */ margin-left:0%; width:100%;/*! vertical-align: bottom; *//*! left: 40%; */" >
                      
                <div>
					<div>
                            <div style="float:left;position:absolute;margin-left:15px;">
                                <img src="{{ asset('imagenes/logoGobierno.png') }}" alt="logo-gobierno">
                            </div>
                            
                            <span class="bigger-120" style="float:initial; vertical-align:bottom;margin-left: 35%;">
                                <span class="blue bolder" >Udc</span>
                                Applicaci&oacute;n &copy; 2018
                            </span>

                            &nbsp; &nbsp;
                            <span class="action-buttons">
                                <a href="#">
                                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                                </a>
                            </span>
                            <div style="float:right; margin-right:15px;">
                                <img src="{{ asset('imagenes/direccionUdc.png') }}" alt="direccion-Udc">
                            </div>
					</div>
				</div>
			</footer>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
        </section>
        		

		

	
	    <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter25836836 = new Ya.Metrika({id:25836836,
                            webvisor:true,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true});
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/25836836" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-38894584-2', 'auto');
            ga('send', 'pageview');

        </script>
        <!-- Scripts -->
            
        <script src="{{  asset('assets/js/jquery.min.js')  }}"></script>
        <script src="{{  asset('assets/js/bootstrap.min.js')  }}"></script>
        <script src="{{  asset('assets/js/jquery.mask.min.js')  }}"></script>
        <!-- ace settings handler -->
        <script src="{{  asset('assets/js/ace-extra.min.js') }}"></script>
        <!-- ace scripts -->
        <script src="{{ asset('assets/js/ace-elements.min.js')  }}"></script>
        <script src="{{ asset('assets/js/ace.min.js')  }}"></script>
        <script src="{{ asset('assets/js/moment.js')  }}"></script>
        <script src="{{ asset('assets/js/moment_es.js')  }}"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')  }}"></script>

        <script src="{{ asset('assets/js/bootstrap-switch.js')  }}"></script>

        <script>
        
            $(function($){
                $(document).ready(function(){
                   // $('#help-pop').popover();
                   $("[data-toggle=popover]").popover();
                });
            /*@role(['Secretaria','Administrador'])
                        
                    
                        $('#toggle-menu').show();
                        
                    
            @endrole
                @role(['Estudiante'])
                    
            @endrole*/
            /* $('#sidebar2').insertBefore('.page-content');
                    
                $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
                
                
                $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
                    if(event_name == 'sidebar_fixed') {
                        if( $('#sidebarAce').hasClass('sidebar-fixed') ) {
                        $('#sidebar2').addClass('sidebar-fixed');
                        $('#navbar').addClass('h-navbar');
                        }
                        else {
                        $('#sidebar2').removeClass('sidebar-fixed')
                        $('#navbar').removeClass('h-navbar');
                        }
                    }
                }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebarAce').hasClass('sidebar-fixed')]);
            
        */
            /* $('#menu-minimizado').click(function(){
                    if( $('#sidebar').hasClass('active') ){
                        $('#sidebar').removeClass('active');
                    
                        //$('#menu-li').css("display", "block");
                    // $('#menu-li').removeClass('hide');
                    }else{
                        $('#sidebar').addClass('active');
                        
                        //$('#menu-li').css("display", "block");
                        //$('#menu-li').removeClass('hide');
                
                    }
                });*/
                
                $('#menu-minimizado').click(function(){
                
                    if( $('#sidebarAce').hasClass('display') ){
                        $('#sidebarAce').removeClass('display');
                        
                    }
                    else{
                        $('#sidebarAce').addClass('display');}
                    
                
                });

                /*$('#content').click(function(){
                    if( $('#sidebar').hasClass('active') ){
                        $('#sidebar').removeClass('active');
                        
                    }
                });*/
                //$('#sidebarAce').removeClass('menu-min');
                $('#sidebar-toggle-icon').addClass('fa fa-angle-double-left');
                $('#sidebar-toggle-icon').on('click', function (e) 
                {   
                    console.log("hika");
                    console.log("e")
                    if ($('#sidebar-toggle-icon').hasClass('fa fa-angle-double-left'))
                    {
                        console.log("1");
                    
                    $('#sidebar-toggle-icon').removeClass('fa fa-angle-double-left');
                        $('#sidebar-toggle-icon').addClass('fa fa-angle-double-right');
                        $(document).ready(function(){
                            //aquí meteremos las instrucciones que modifiquen el DOM
                            
                        
            
                        if ($('#sidebarAce').hasClass('sidebar'))
                        {
                            console.log("jdkljkdlf");
                            $('#sidebarAce').addClass('menu-min');
                            
                        };
                        }); 
                    }    
                    else
                    {
                        console.log("2");
                        
                        $('#sidebar-toggle-icon').removeClass('fa fa-angle-double-right');
                        $('#sidebar-toggle-icon').addClass('fa fa-angle-double-left');
                        
                        

                        
                        $('#sidebarAce').removeClass('sidebar menu-min');
                        $(document).ready(function(){
                            //aquí meteremos las instrucciones que modifiquen el DOM
                            $('#sidebarAce').addClass('sidebar');
                        }); 
            
                        if ($('#sidebarAce').hasClass(''))
                        {
                            console.log("no se no se");
                        
                         
                        };
                    }
                    
                    
                });
                $(document).ready(function(){
                   // $('#help-pop').popover();
                   $("[data-toggle=popover]").popover();
                });
                
                               
            

                $('.close-error').click(function( e ){
                    $(e.target).parent().remove();
                });
                //Mascaras de Formato
                $('.dni').mask('99.999.999', { placeholder: '99.999.999'});
                
                $('.telefono').mask('(999)999-9999', {placeholder: '(999)999-9999' });
            
                $('.email-udc').mask('*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]'+'@udc.edu.ar', {reverse: true, selectOnFocus: true});

                $('integer-positivo').mask('9999');

                $('.date').datetimepicker({
                    format: 'DD-MM-YYYY'
                });

                $('input, select, textarea').on('invalid', function(e){

                    console.log( e );
                    var validacion = e.target.validity;

                    var msg = "";
                    
                    var peaje = false;

                    if ( validacion.valueMissing == true ){
                        msg = "El campo es obligatorio";
                        peaje = true;
                    }
                    else if( validacion.typeMismatch == true ){

                        var type = e.target.type;

                        if( type == "email" ){
                            msg = "No corresponde a un Email valido";
                        }
                        else{
                            msg = "ewr";
                        }
                        peaje = true;
                    }
                    else if ( validacion.patternMismatch == true ){
                        
                        var pattern = e.target.pattern;

                        //Se reemplazan los mensajes de errores
                        if( pattern == "^\w+(\s\w+)*$"){//"^[a-zA-Z_áéíóúÁÉÍÓÚñÑ\\W\\s]*$" ){
                            msg = "El campo solo acepta letras";
                        }
                        else if ( pattern == "\\d{2}[.]\\d{3}[.]\\d{3}"){
                            msg = "El campo solo acepta numeros con formato 99.999.999";
                        }
                        else if ( pattern == "^[0-3]?[0-9].[0-3]?[0-9].(?:[0-9]{2})?[0-9]{2}$" ){
                            msg = "El campo solo acepta fecha con formato dd--mm-aaaa";
                        }
                        else if ( pattern == "^[(]\\d{3}[)]\\[-]d{3}[-]\\d{4}$" ){
                            msg = "El campo solo acepta el formato (999)-999-9999";
                        }
                        else if ( pattern == "[a-z0-9._%+-]+@udc.edu.ar"){
                            msg = "El campo solo acepta Email de la UDC";
                        }
                        else if ( pattern == "[0-9]{1,4}"){
                            msg = "El campo solo acepta números enteros";
                        }
                        else{
                            msg = "Ha ingresado un formato invalido"; 
                        }
                        peaje = true;

                    }
                    else{

                    }
                    if( peaje == false){
                        e.preventDefault();
                    }
                    return this.setCustomValidity(msg);
                });




            });
        </script>

        @yield('scripts')
        @yield('scripts_2')  
  
    </body>
</html>
