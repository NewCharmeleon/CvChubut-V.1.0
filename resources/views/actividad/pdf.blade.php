<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Curriculum {{ $estudiante->nombre_apellido }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
        @page 
        {
            size: auto portrait;
            margin-top:5%;
            margin-bottom:10%;
            page-break-before: always;
             
        } 
        
        table 
        {
             
            page-break-before: top;
        } 
        @page:left 
        { @bottom-left 
        { content: counter(pagina); } 
        } 
        @page:right {
             @bottom-right 
        { content: counter(pagina); }
         }
        @media all {
        .page-break { display:none; }
        }

        @media print {
        .page-break { display:block; page-break-before:always; }
        }
            .texto-primario {
            color:#008bd0;
            text-transform: uppercase;
            }
            .texto-secundario {
                color:#05567e;
            }
            .mayuscula {
                text-transform: uppercase;
            }
            .columna-entera{
                /*width:80%;*/
                text-align: left;
            }
            .columna-derecha {
                width: 50%;
                text-align: left;
            }
            .columna-izquierda {
                text-align: left;
            }
            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
                border-left: 1px solid #dee2e6;
                border-right: 1px solid #dee2e6;
                border-bottom: 2px solid #dee2e6;
                border-top: 1px solid #dee2e6;  
            }      
            table::after, table::before {
                box-sizing: border-box;
            }  
            table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
                padding: .45rem;
                
            }
            table td, table th {
                padding: .45rem;
                vertical-align: top;
            }


            .back-panel {
                color: #ffffff;           
                background-color: #008bd0 !important;
            }
        
            .row {
                width: 100%
            }
    
            .row:after,
            .row:before {
                display: table;
                content: " "
            }
            .row:after {
                clear: both
            }


            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9,
            .col-md-1,
            .col-md-10,
            .col-md-11,
            .col-md-12,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-sm-1,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-xs-1,
            .col-xs-10,
            .col-xs-11,
            .col-xs-12,
            .col-xs-2,
            .col-xs-3,
            .col-xs-4,
            .col-xs-5,
            .col-xs-6,
            .col-xs-7,
            .col-xs-8,
            .col-xs-9 {
                position: relative;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            
            
            }
            .col-sm-6 {
                width: 50%;
            }
            .col-sm-3 {
                    width: 25%;
            }
            .back-panel .col-sm-6 {
                float: left;
                padding-top: 25px;
                vertical-align: middle;
            }
            .back-panel .col-sm-3 {
                float: right;
            }
            hr {
                border: 1.45px solid #ee7f00;
            }
       
        </style>
    </head>
    <body style="padding:5px;padding-top:30px">

        <header syle="position:fixed;padding:0px">
            <div style="float:right;margin-bottom:80px;">
                <img src="{{ asset('imagenes/logo-navbar.png') }}" width="90px">

            </div>
        </header>

        <div class="back-panel row">

        <div class="col-sm-6">
            <h4 style="text-transform: uppercase;letter-spacing: 0.3em;font-weight: 600">
                {{ $estudiante->nombre_apellido }}
            </h4>
           
        </div>
        
        <div class="col-sm-3">
            <p> <b>Email</b> &nbsp;{{ $email }}</p>
            <p> <b> Nacionalidad</b> &nbsp;  {{ $estudiante->nacionalidad }}</p>
            <p> <b> Dni</b> &nbsp;  {{ $estudiante->dni }}</p>
            <p> <b>Nacido/a el </b> &nbsp; {{ $estudiante->fecha_nacimiento }} </p>
            <p> <b>Tel&eacute;fono </b> &nbsp;{{ $estudiante->telefono }} </p>
        </div>

    </div>

    <div style="margin-top:10px;">
      
        <h4 class="texto-primario"> <u>  Carrera </u> </h4>
        <p>  {{ isset ($estudiante->carrera ) ? $estudiante->carrera->nombre : 'No registrada.' }}</td>
              </p>
        <h4 class="texto-primario"> <u> Establecimiento </u> </h4>
        <p>  UDC - Universidad del Chubut </p>
        <div style="padding-bottom:10px;"></div>
        <hr>
             
    </div>

        <!--div style="text-align: center; text-transform: uppercase; color:#008bd0;">
            <h3>Universidad del Chubut</h3>
            <h3>Mi Trayectoria Educativa</h3>
        </div>
        
        <div style="text-align: right;">
            <h4 ></h4>
            
            <p class="texto-secundario">
                {{-- $estudiante->nacionalidad --}} &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;Nacido/a el: {{-- $estudiante->fecha_nacimiento --}}
            </p>
            <p class="texto-secundario">
                Tel&eacute;fono: {{-- $estudiante->telefono --}} &nbsp;&nbsp;&nbsp;&nbsp; Correo Electr&oacute;nico: {{-- $estudiante->usuario->email --}}  
            </p>
        </div -->

        <div style="margin-top:10px;">
            <h4 class="texto-primario"><u>Actividades</u></h4>
            @foreach ($actividades as $actividad)

                <table style="color:rgb(17, 8, 8); ">

                    <thead>

                        <tr>
                            <th colspan="2" class="texto-secundario"><u>{{ $actividad->ambito_actividad->nombre }}:</u> {{ $actividad->ambito_actividad->descripcion }}</th>
                            
                        </tr>
                        
                        <tr>
                                            
                            <th class="texto-primario mayuscula columna-izquierda">&nbsp;&nbsp;{{ $actividad->nombre }} </th>
                            <th class="columna-derecha">{{ $actividad->fecha_inicio_show }}&nbsp;-&nbsp;{{ $actividad->fecha_fin_show }}</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td class="columna-izquierda">
                                    &nbsp;&nbsp;<u class="texto-secundario mayuscula">Lugar: </u> &nbsp; {{ $actividad->lugar}}
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula">Instituci&oacute;n: </u> {{ $actividad->institucion->nombre }} 
                                &nbsp;&nbsp;{{ $actividad->institucion->localidad }} -&nbsp;{{ $actividad->institucion->provincia }} -&nbsp;{{ $actividad->institucion->pais }}
                                
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="columna-izquierda">
                                &nbsp;&nbsp;<u class="texto-secundario mayuscula">Tipo: </u> &nbsp; {{ $actividad->actividad_tipo->nombre }}
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula">Frecuencia: </u>&nbsp;{{ $actividad->frecuencia }}
                            </td>
                        </tr>
                        <tr>
                            <td class="columna-izquierda">
                                &nbsp;&nbsp;<u class="texto-secundario mayuscula">Tipo de Participaci&oacute;n:</u> {{ $actividad->tipo_participacion->nombre }}
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula">Duraci&oacute;n: </u>&nbsp;{{ $actividad->duracion }}
                                                     {{ $actividad->duracion_tipo }}
                            </td>
                        </tr>
                        <tr>
                            <td class="columna-izquierda">
                                &nbsp;&nbsp;<u class="texto-secundario mayuscula">Modalidad:</u> {{ $actividad->modalidad->nombre }}
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula"> <u class="texto-secundario mayuscula">Observaciones:</u>&nbsp;{{ $actividad->observacion }}
                            
                            </td>
                        </tr>
                       
                    </tbody>

                </table>
                
            @endforeach
            
            @if( count( $actividades ) == 0 )
                <p>No posee Actividades Registradas </p>
            @endif
            
            <hr>
            <br><br><br>
                
        </div>
        

        <div style="margin-top:10px;">
            <h4 class="texto-primario"><u>Experiencias Laborales</u></h4>
            @foreach ($experiencias_laborales as $experiencia_laboral)

                <table style="color:rgb(17, 8, 8)">

                    <thead>

                        <tr>
                            <th class="texto-primario mayuscula columna-izquierda"><u>Puesto:</u>&nbsp;&nbsp;{{ $experiencia_laboral->puesto }} </th>
                            <th class="columna-derecha">{{ $experiencia_laboral->fecha_ini_show }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $experiencia_laboral->fecha_fin_show }}</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td class="columna-izquierda">
                                <u class="texto-secundario mayuscula">Tarea Realizada: </u> &nbsp; {{ $experiencia_laboral->descripcion_de_tareas }}
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula">Referencia:</u> &nbsp; {{ $experiencia_laboral->referencia }}
                            </td>
                        </tr>
                        <tr>
                            <td class="columna-izquierda">
                                <u class="texto-secundario mayuscula">Lugar </u> &nbsp; {{ $experiencia_laboral->localidad }} &nbsp;- {{ $experiencia_laboral->provincia }}
                            
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula">Rentado</u>&nbsp;{{ $experiencia_laboral->rentado_show }}
                            </td>
                        </tr>
                        <tr>
                            <td class="columna-izquierda">
                                <u class="texto-secundario mayuscula">Empleador: </u> &nbsp; {{ $experiencia_laboral->empleador}}
                            </td>
                            <td class="columna-derecha">
                                <u class="texto-secundario mayuscula"></u>&nbsp;
                            </td>
                        </tr>
                        
                    </tbody>

                </table>
                
            @endforeach
            
            @if( count( $experiencias_laborales ) == 0 )
                <p>No posee Experiencia Laboral Registrada </p>
            @endif
            

            <hr>
                
        </div>

    </body>
</html>
