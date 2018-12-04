<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Favicon de la Uni-->
    <link rel="icon" href="{{asset('favicon.png') }}" sizes="16x16">
    <link rel="icon" href="{{asset('favicon.png') }}" sizes="32x32">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Titulo-->
    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- All Styles -->

    <!-- Bootstrap CSS -->
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/font-awesome/font-awesome.min.css') }}" />
    <!-- Fonts -->
    <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,300">

    <!-- Plugins -->
     <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/template/picnic.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/template/plugins.min.css') }}" >
    
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap-switch.css') }}">
    
    
    <!-- ace styles Admin//ace.jeka.by/index.html//-->
		<link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="{{ asset('assets/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}" />
       

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}" />
		<![endif]-->

		<!-- inline styles related to this page -->

		
     <!-- Custom CSS -->
    @yield('mis_estilos')
  
  
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        nav {
            z-index: 0;
        }
        tr:nth-child(even) {
            background:none;
        }
        .nav-top {
            margin-bottom: 0px;
            height: 110px;
            background: #fff;
            border-bottom-color: black;
            position: fixed;
            top: 0;
            width: 100%;
        }
        .btn {
            margin: 10px 0 10px 0;
        }
        
        
        #logo {
            width: 270px;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100%;
            background: #f8f8f8;
            display: none;
            color: #fff;
            transition: all 0.3s;
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 109px;
            position: fixed;
        }
        #sidebar .sidebar-header {
            padding: 20px;
            background: #2196F3;
        }
        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }
        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }
        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            text-decoration-line: none;
        }
        #sidebar ul li a:hover {
            color: #fff;
            background: #999;
        }
        #sidebar ul li.active > a, a[aria-expanded="true"] {
            color: #fff;
            background: #999;
        }


        @media (max-width: 788px) {
            #avatar {
                display: none;
            }
        }
        @media (max-width: 388px) {
            #logo {
                width: 250px;
            }
        }

        @media (max-width: 360px) {
            #logo {
                width: 230px;
            }
        }
         @media (max-width: 326px) {
            #logo {
                width: 150px;
            }
        }
        @media (max-width: 991px) {
            #sidebar {
                display: none;               
            }
            #sidebar.active {
                display: block;
            }
            .navbar-toggle {

    display: block;

}
            
           
        }
        @role(['Secretaria','Administrador'])
    @media (min-width: 991px) {
        .navbar-header {
            float: left;
         //   margin-top: -4%;
        }
        #nab-menu-min {
            display: none !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }
        #nab-menu-min ul {
            background: #438eb9 !important;
             list-style-type: none;
            width: 73%;
            z-index: auto;
}
        .toggle-menu {
            display: block !important;
            height: 30px !important;
            //padding-bottom: 0;
            overflow: visible !important;
            height: 20px !important;
        }
       
        #nab-menu-min.in {
            display: block !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
            width: 130%;
}
        }
        .navbar-udc div.navbar-header .navbar-toggle {

            background: transparent !important;

        }
        .navbar-udc div.navbar-header a.navbar-brand {
            color: white;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 20px !important;
        }
        
        /*.navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse, .navbar-static-top .navbar-collapse {
	padding-right: 2%;
	padding-left: 26%;
}*/
    }
    @media (min-width: 796px) {
       /* .navbar-toggle {
            display: block !important;
            
        }*/
        /*.navbar-udc .navbar-header {
            float: right !important;
            width: 100%;
            
        }*/
        /*.navbar-header {
            float: none;
            margin-top: -4%;
        }*/
        /*#nab-menu-min.in {
            display: block !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }*/
        /* #nab-menu-min {
            display: none !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }*/
        /* #toggle-menu {
            display: block !important;
            //height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }*/
    }
    
    @endrole
     @role(['Estudiante'])
    @media (max-width: 991px) {
       /* .navbar-header {
            float: left;
         //   margin-top: -4%;
        }
        #nab-menu-min {
            display: none !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }
        /* #toggle-menu {
            display: block !important;
            height: auto !important;
            //padding-bottom: 0;
            overflow: visible !important;
            //float: left;
        }*/
       /* #nab-menu-min.in {
            display: none !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }
        
        /*.navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse, .navbar-static-top .navbar-collapse {
	padding-right: 2%;
	padding-left: 26%;
}*/
    //}
    @endrole

        .avatar{
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        
        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
        /* Variables */
        /* Mixins */
        body {

            font-family: "Montserrat", sans-serif;

            font-style: normal;
            font-family: sans-serif;
            width: 100%;
        }
        footer{
            padding: 20px;
            background-color: #eeeeee;
        }
        .container{
            width: 100%;

        }

        #content{
            padding-top: 40px;
            min-height: 600px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .primary-text {
            color: black;
            font-weight: 600;
            text-transform: uppercase;
        }
        .text-show {
            padding-top: 7px;  
            margin-bottom: 0;
        }
        .panel-title {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 24px;
            color: inherit;
            font-weight: 500;
        }
        .close-error {
            font-size: 13px;
        }
        body h1 {
            text-transform: uppercase;
            font-size: 30px;
            //color: #576e81;
            margin: 30px 0px 0px 0px;
        }
        body h2 {
            font-weight: normal;
            font-size: 18px;
            //color: #F98DB9;
            margin: 10px 0px 0px 0px;
        }
        body p {
             margin: 0 auto;
        }   
        body{
            font-size: 15px;
        }   

        .navbar-udc {
          background: #2196F3;
          border: 0;
          width: 100%;
          //min-height: 53px;
          display: block;
        }
        .navbar-udc .container-fluid {
              display: grid;
        }
        .navbar-udc div.navbar-header a.navbar-brand{
            color: white;
            text-transform: uppercase;
            font-weight: 800;
            font-size: 14px;
        }
        .navbar-udc div.navbar-header .navbar-toggle{
            background: white;
        }
         #nab-menu-min ul {
            background: #2196F3;
            list-style-type: none;
        }

        #nab-menu-min ul li{
            margin: 0 !important;
        }

        #nab-menu-min ul li a {
            display: block;
            color: white;
            text-decoration: none;
            min-width: 160px;
            font-weight: 600;
            font-size: 14px;
        }
      
        /* Change the link color on hover */
        #nab-menu-min ul li a:hover {
            background-color: #ee7f00;
            color: white;
            //min-height: 53px;
            vertical-align: middle;
        }

        .link-acceso li a {
            min-height: 20px;
            color : #eeee;
        }


     /*   [type="submit"],  [type="submit"]:hover{
            padding: 6px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

*/
        .model-acction {
            margin: 5px;
            font-weight: 550;
            font-size: 13px;
            text-decoration: none !important;
        }


        input[type="checkbox"], input[type="radio"] {
            opacity: 1;
            width: 100%;
            margin: 0;

        }
        .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {

            margin-left: 0px;
        
        }

        //Estilos opcionales
        /* Material style */
        .btn {
        border: none;
        cursor: pointer;
        padding: 6px 12px;
        // color: white;
        // padding: 15px 40px;
        border-radius: 2px;
        // font-size: 22px;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, .4) !important;
        
        position: inherit;
        overflow: hidden;
        z-index: 0;
        }

        .btn-default {
            background: transparent;
        }
        .btn-default:hover,.btn-default:focus  {
            background: #e6e6e6  !important;
        }
        .btn-primary {
            background: #2196F3;
        }
         .btn-primary:hover,.btn-primary:focus  {
            background: #5bc0de  !important;
        }
        .btn-success {
            background: #26a69a;
        }
        .btn-success:hover,.btn-success:focus  {
            background: #2bbbad !important;
        }

        .btn-warning {
            background: #ffab40;
        }
        .btn-warning:hover,.btn-warning:focus  {
            background: #ffd8a6 !important;;
        }

        .btn-danger {
            background: #F44336 ;
        }
        .btn-danger:hover,.btn-danger:focus  {
            background: #E57373 !important;
        }

        .btn:after {
            content: '';
            position: absolute;
           // top: 50%;
           // left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, .5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 1;
        }
        20% {
            transform: scale(25, 25);
            opacity: 1;
        }
        100% {
            opacity: 0;
            transform: scale(40, 40);
        }
        }

        .btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
        
       
        th {
            vertical-align: bottom;
            text-transform: uppercase;
            border-bottom:0px !important; 
            background: #2196F3;
            font-size: 13px;
        }
        .btn, .btn-large, .btn-floating, .dropdown-content, .collapsible, .side-nav {
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
        }


        .pagination>li>a, .pagination>li>span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #2196F3;
            text-decoration: none;
            background-color: #fff;
            border:0;
            font-size: 1.2rem;
               // line-height: 30px;
            text-align: center;
            border-radius: 50%;
        }
        .pagination>li.active>span {
            color: #fff;
            background-color: #2196F3;
        }


    .panel {
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    }
    .panel-footer{ 
        background-color: inherit;
        border-top: 1px solid rgba(160,160,160,0.2);
        position: relative;
        padding: 16px 24px;
    }
    .center{
        text-align: center;
    }
    .ace-nav > li {
        line-height: 45px;
        height: 45px;
        border-left: 0;
        padding: 0;
        position: relative;
        float: left;
    }
    .dataTables_wrapper .row:first-child {
        padding-top: 0px;
        padding-bottom: 0px;
        background-color: transparent;
    }
    #table-ace{
         margin-top: 50px !important;
         /*position: absolute;*/
         overflow: auto;
        
    }
    .navbar .navbar-nav > li:first-child {
            border-width: 0px;
    }
    .navbar {
        margin: 0;
        padding-left: 0;
        padding-right: 0;
        border-width: 0;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        max-height: 100px;
        background: #438EB9;
    }
    .label, [data-tooltip]::after, button, .button, [type="submit"], .dropimage {
    display: inline-block;
    text-align: center;
    margin: 0;
    padding: .3em .9em;
    vertical-align: middle;
    background: #0074d91a;
    color: #fff;
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
    

    </style>
</head>
<body>

    <header>
        @include('layouts.navbarAce')
        
    </header>


        <nav id="sidebar">
            <!-- Sidebar Header -->
            <div class="sidebar-header">
                @if (!Auth::guest())
                    <h3> <i class="glyphicon glyphicon-education"></i>  {{Auth::user()->persona->nombre_apellido }} </h3>

                    <div style="min-width: 220px;" class="sidebar-auth">
                        @if(Auth::user()->hasRole('Estudiante'))
                            <div>
                                 @if( isset( Auth::user()->persona->carrera->nombre )) 
                                    {{ Auth::user()->persona->carrera->nombre }} 
                                 @endif
                            </div>
                        @endif  
                @else
                    <h3> <i class="glyphicon glyphicon-education"></i>  CvChubut </h3>

                    <div style="min-width: 220px;" class="sidebar-auth">
                        
                            <div>
                                 <p>Sistema de Gesti&oacute;n</p>
                            </div>
                          
                @endif
            </div>

            @if (!Auth::guest())
            <ul class="list-unstyled components" style="border-top: 1px solid #47748b;">
                <li>
                    <a href="{{ route('perfil') }}">
                        <i class="glyphicon glyphicon-user"></i> Informaci&oacute;n Personal
                    </a>
                </li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="glyphicon glyphicon-log-out"></i>
                            Cerrar sesi&oacute;n
                    </a>
                    
                <li>
            </ul>
            @endif

            <!-- Sidebar Links -->
            <ul class="list-unstyled components" style="border-bottom:none;padding-top:5px;">
                <li><a href="#">Home</a></li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Paginas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="#">Pagina</a></li>
                        <li><a href="#">Pagina</a></li>
                        <li><a href="#">Pagina</a></li>
                    </ul>
                </li>
            </ul>
            
        </nav> 

        <div id="content" class="content container">
            @if(! Auth::guest() )
                @include('layouts.accesos_roles')
            @endif    

            @yield('content')
        </div>

    <footer>
        <div class="row">
            <div style="position: absolute;margin-left:15px;">
                <img src="{{ asset('imagenes/logoGobierno.png') }}" alt="logo-gobierno">
            </div>
            <div style="float:right; margin-right:15px;">
                <img src="{{ asset('imagenes/direccionUdc.png') }}" alt="direccion-Udc">
            </div>
        </div>              
    </footer>
    
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
            
           @role(['Secretaria','Administrador'])
                    
                //$('#nab-menu-min').toggle();
                //$('#nab-menu-min').addClass('in');
                //$('#nab-menu-min').attr("aria-expanded", "false");
                //$('#menu-li').css("display", "none");
                //$('#menu-li').toggle();
                //$('#nab-menu-min').addClass('in');
                //if ($('#mtoggle-menu').hide()){
                    $('#toggle-menu').show();
                    
                    //$('#menu-li').css("display", "block !important");
                //}else{
                    //$('#toggle-menu').show();
                   // $('#menu-li').css("display", "block !important");
                    //$('#menu-li').css("display", "block");
                    //$('#menu-li').removeClass('hide');
               
                //}
                 //$('#sidebar').addClass('active');
                //$('#sidebar.active').css('display', 'none');
                /*function(d) {
                    var e = a(this);
                    e.attr("data-target") || d.preventDefault();
                    var f = b(e),
                        g = f.data("bs.collapse"),
                        h = g ? "toggle" : e.data();
                    c.call(f, h)

                }*/
                //$(document).ready(function(){
	            	//$(window).resize( function()
                    //{
                        //$('.navbar-collapse.collapse.in').css('display','block! Important');
                        //$('#menu-minimizado').click(function(){
                        //if ( !$('#nab-menu-min').hasClass('collapsed') )
                       // {
                            //$('#nab-menu-min').addClass('collapsed');
                            // $('#menu-li').css("display", "none !important");
                           // $('#menu-li').addClass('hide');
                            //$('#menu-li').css("display", "block !important");
                       // }
                    //});
                //}) ;   
                //$('#nab-menu-min').addClass('collapsed');
           @endrole
             @role(['Estudiante'])
                   // $('#toggle-menu').show();
                    //$('#menu-li').css("display", "block");
                //$('#nab-menu-min').toggle();
                //$('#nab-menu-min').addClass('in');
                //$('#nab-menu-min').attr("aria-expanded", "false");
                //$('#menu-li').css("display", "none");
                //$('#menu-li').toggle();
                //$('#menu-li').show();
                //$('#nab-menu-min').css("display", "block");
                
               //$('#toggle-menu').hide();
                 //$('#sidebar').addClass('active');
                //$('#sidebar.active').css('display', 'none');
                /*function(d) {
                    var e = a(this);
                    e.attr("data-target") || d.preventDefault();
                    var f = b(e),
                        g = f.data("bs.collapse"),
                        h = g ? "toggle" : e.data();
                    c.call(f, h)

                }*/
                //$(document).ready(function(){
	            	//$(window).resize( function()
                    //{
                        //$('.navbar-collapse.collapse.in').css('display','block! Important');
                        //$('#menu-minimizado').click(function(){
                        //if ( !$('#nab-menu-min').hasClass('collapsed') )
                       // {
                            //$('#nab-menu-min').addClass('collapsed');
                            // $('#menu-li').css("display", "none !important");
                           // $('#menu-li').addClass('hide');
                            //$('#menu-li').css("display", "block !important");
                       // }
                    //});
                //}) ;   
                //$('#nab-menu-min').addClass('collapsed');
           @endrole

            $('#menu-minimizado').click(function(){
                if( $('#sidebar').hasClass('active') ){
                    $('#sidebar').removeClass('active');
                    //$('#menu-li').css("display", "block");
                   // $('#menu-li').removeClass('hide');
                }else{
                    $('#sidebar').addClass('active');
                    //$('#menu-li').css("display", "block");
                    //$('#menu-li').removeClass('hide');
               
                }
            });

            $('#content').click(function(){
                if( $('#sidebar').hasClass('active') ){
                    $('#sidebar').removeClass('active');
                    //$('#menu-li').css("display", "block");
                    //$('#menu-li').removeClass('hide');
                    //$('#nab-menu-min').show();
                   // $('#menu-li').show();
                }
            });
            

            $('.close-error').click(function( e ){
                $(e.target).parent().remove();
            });
            //Mascaras de Formato
            $('.dni').mask('99.999.999', { placeholder: '99.999.999'});
            
            $('.telefono').mask('(999)9999-999', {placeholder: '(999)9999-9999' });
           
            $('#email-udc').mask('#@udc.edu.ar', {reverse: true, selectOnFocus: true});

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
