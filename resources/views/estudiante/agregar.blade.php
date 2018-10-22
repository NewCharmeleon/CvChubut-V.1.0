
@extends('layouts.app')
@section('title', 'Estudiantes Nuevos')
@section('mis_estilos')
<style class="cp-pen-styles">/* Fonts */
    body .loader {
    height: 100%;
    position: relative;
    margin: auto;
    width: 400px;
    text-align: center;
    display: none;
    top: 109px;
    // margin-top: 119px;
    }
    body .loader_overlay {
    width: 150px;
    height: 150px;
    background: transparent;
    -webkit-box-shadow: 0px 0px 0px 1000px rgba(255, 255, 255, 0.67), 0px 0px 19px 0px rgba(0, 0, 0, 0.16) inset;
            box-shadow: 0px 0px 0px 1000px rgba(255, 255, 255, 0.67), 0px 0px 19px 0px rgba(0, 0, 0, 0.16) inset;
    border-radius: 100%;
    z-index: -1;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    }
    body .loader_cogs {
    z-index: -2;
    width: 100px;
    height: 100px;
    top: -120px !important;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    }
    body .loader_cogs__top {
    position: relative;
    width: 100px;
    height: 100px;
    -webkit-transform-origin: 50px 50px;
            transform-origin: 50px 50px;
    -webkit-animation: rotate 10s infinite linear;
            animation: rotate 10s infinite linear;
    }
    body .loader_cogs__top div:nth-of-type(1) {
    -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
    }
    body .loader_cogs__top div:nth-of-type(2) {
    -webkit-transform: rotate(60deg);
            transform: rotate(60deg);
    }
    body .loader_cogs__top div:nth-of-type(3) {
    -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
    }
    body .loader_cogs__top div.top_part {
    width: 100px;
    border-radius: 10px;
    position: absolute;
    height: 100px;
    background: #f98db9;
    }
    body .loader_cogs__top div.top_hole {
    width: 50px;
    height: 50px;
    border-radius: 100%;
    background: white;
    position: absolute;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    }
    body .loader_cogs__left {
    position: relative;
    width: 80px;
    -webkit-transform: rotate(16deg);
            transform: rotate(16deg);
    top: 28px;
    -webkit-transform-origin: 40px 40px;
            transform-origin: 40px 40px;
    animation: rotate_left 10s .1s infinite reverse linear;
    left: -24px;
    height: 80px;
    }
    body .loader_cogs__left div:nth-of-type(1) {
    -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
    }
    body .loader_cogs__left div:nth-of-type(2) {
    -webkit-transform: rotate(60deg);
            transform: rotate(60deg);
    }
    body .loader_cogs__left div:nth-of-type(3) {
    -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
    }
    body .loader_cogs__left div.left_part {
    width: 80px;
    border-radius: 6px;
    position: absolute;
    height: 80px;
    background: #97ddff;
    }
    body .loader_cogs__left div.left_hole {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    background: white;
    position: absolute;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    }
    body .loader_cogs__bottom {
    position: relative;
    width: 60px;
    top: -65px;
    -webkit-transform-origin: 30px 30px;
            transform-origin: 30px 30px;
    -webkit-animation: rotate_left 10.2s .4s infinite linear;
            animation: rotate_left 10.2s .4s infinite linear;
    -webkit-transform: rotate(4deg);
            transform: rotate(4deg);
    left: 79px;
    height: 60px;
    }
    body .loader_cogs__bottom div:nth-of-type(1) {
    -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
    }
    body .loader_cogs__bottom div:nth-of-type(2) {
    -webkit-transform: rotate(60deg);
            transform: rotate(60deg);
    }
    body .loader_cogs__bottom div:nth-of-type(3) {
    -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
    }
    body .loader_cogs__bottom div.bottom_part {
    width: 60px;
    border-radius: 5px;
    position: absolute;
    height: 60px;
    background: #ffcd66;
    }
    body .loader_cogs__bottom div.bottom_hole {
    width: 30px;
    height: 30px;
    border-radius: 100%;
    background: white;
    position: absolute;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    }

    /* Animations */
    @-webkit-keyframes rotate {
    from {
        -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
    }
    }
    @keyframes rotate {
    from {
        -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
    }
    }
    @-webkit-keyframes rotate_left {
    from {
        -webkit-transform: rotate(16deg);
                transform: rotate(16deg);
    }
    to {
        -webkit-transform: rotate(376deg);
                transform: rotate(376deg);
    }
    }
    @keyframes rotate_left {
    from {
        -webkit-transform: rotate(16deg);
                transform: rotate(16deg);
    }
    to {
        -webkit-transform: rotate(376deg);
                transform: rotate(376deg);
    }
    }
    @-webkit-keyframes rotate_right {
    from {
        -webkit-transform: rotate(4deg);
                transform: rotate(4deg);
    }
    to {
        -webkit-transform: rotate(364deg);
                transform: rotate(364deg);
    }
    }
    @keyframes rotate_right {
    from {
        -webkit-transform: rotate(4deg);
                transform: rotate(4deg);
    }
    to {
        -webkit-transform: rotate(364deg);
                transform: rotate(364deg);
    }
    }
</style>
@endsection
@section('content')

<div id="cargar" >
    <h3> Estudiantes nuevos </h3>

    <div class="alert alert-info" role="alert">
        Cargar archivo (Temporalmente, si es formato CSV, previamente convertirlo a Json usando el siguiente link, subir el archivo en el Paso 1 de la pagina "Choose File", continuar con el paso 5 presionando la opcion "CSV To JSON Array", posteriorrmente ponerle un nombre en "Save your result" y finalizando presionando la opcion "Download Result" para descargar el archivo formateado ),
        luego puede adjuntarlo usando el boton correspondiente
        <b> 
            <a href="http://www.convertcsv.com/csv-to-json.htm" target="_blank">Convertidor de archivo para formato Json usado en el sistema </a>
        </b>
    </div>
    <form action="{{ route('agregar.estudiantes.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" id="formulario">
    
    <div class="row" style="margin-bottom:20px;">
        <div class="col-sm-4">
            <label for="">  Adjuntar archivo  </label>
            <input type="file" name="estudiante" id="estudiante">  
        </div>          
    </div>  

    <div class="row">
        <div class="col-sm-4">
            <button type="submit" class="btn btn-success" id="enviar"> Enviar el archivo </button>
            <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Volver</a>
        </div>
    </div>
    
  </form>
</div> 

{{-- animacion Loading--}}
<div class='loader'>
  <div class='loader_overlay'></div>
  <div class='loader_cogs'>
    <div class='loader_cogs__top'>
      <div class='top_part'></div>
      <div class='top_part'></div>
      <div class='top_part'></div>
      <div class='top_hole'></div>
    </div>
    <div class='loader_cogs__left'>
      <div class='left_part'></div>
      <div class='left_part'></div>
      <div class='left_part'></div>
      <div class='left_hole'></div>
    </div>
    <div class='loader_cogs__bottom'>
      <div class='bottom_part'></div>
      <div class='bottom_part'></div>
      <div class='bottom_part'></div>
      <div class='bottom_hole'><!-- lol --></div>
    </div>

  </div>
  <h1>CARGANDO ...</h1>
  <h2> <b> Por favor espere </b> </h2>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">


        $(function ($) {
            $('#enviar').click(function(e){
                

                e.preventDefault();

                $('#cargar').hide('slow');
                $('.loader').show();   

                 var formData = new FormData($('#formulario')[0]);


                 setTimeout(function(){
                    $.ajax({
                    type: "POST",
                    url: "{{  route('agregar.estudiantes.store')   }}",
                    data: formData,
                    //timeout:10000;
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function(json) {

                      if(  json.procesado == true   ){
                        alert('Archivo Procesado');
                        window.location.replace("{{ route('estudiantes.index')}}");
                      }else{

                        var errores = "";

                        for( var i in json  ){
                          errores += ","+json[i];
                        }
                        alert(  errores   );
                        $('.loader').hide();
                        $('#cargar').show();   
                      }

                       
                    },
                    error: function() {  
                        $('.loader').hide();
                        $('#cargar').show();              
                        alert('Hubo un error en la carga');
                    }
                    
                });

              },800);

               



            })
        });
    </script>
@endsection