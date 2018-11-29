<!DOCTYPE html>
<html>
    <head>
        <title>Error 403 Forbidden</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
                
                /*background-image: url("{{ asset('imagenes/logo-navbar.png') }}");
                background-repeat: no-repeat;
                background-position-x: center;*/
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 60px;
                /*margin-bottom: 40px;*/
            }
            .texto{
                font-size: 25px;
                /*margin-bottom: 40px;*/
                color: dimgrey;
                width: 76%;
                padding-left: 12%;
                
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                    <div style="text-align:center;">
                            <img src="{{ asset('imagenes/homer-computer-doh.jpg') }}" width="650px">
                    </div>   
                    <div class="title">Error 403 - Forbidden</div>
                       <p class="texto">Haz encontrado este error porque no tienes los permisos necesarios para acceder a esta pagina.</p>
                       <p class="texto">En caso de error, contactate con el Administrador del sitio.</p>
                    </div>
        <div style="text-align:center;opacity: 0.1;">
          <img src="{{ asset('imagenes/logo-navbar.png') }}" width="650px">
        </div> 
        </div>
    </body>
</html>
