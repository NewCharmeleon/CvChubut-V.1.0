<html>
<head>
    <title>Formulario con Combobox</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet" >
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
</head>
<body>

<div class="container col-md-4 col-md-offset-4">

    <form>
        <div class="btn-group" role="group" aria-label="...">
            <h2>Comboboxes</h2>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Seleccione una opción
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($actividadEspecificas as $actividadEspecifica)
                    <li><a href="{{$actividadEspecifica->id}}">{{$actividadEspecifica->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="form-group">
            <h2>Checkboxes</h2>
            @foreach($actividadEspecificas as $actividadEspecifica)
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="{{$actividadEspecifica->id}}">
                    {{$actividadEspecifica->name}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <h2>Radios</h2>
            @foreach($actividadEspecificas as $actividadEspecifica)
            <label class="radio-inline">
                <input type="radio" name="{{$actividadEspecifica->name}}" id="{{$actividadEspecifica->id}}" value="{{$actividadEspecifica->id}}"> {{$actividadEspecifica->name}}
            </label>
            @endforeach
        </div>

        <div class="form-group">
            <h2>Select</h2>
            <select class="form-control">
                @foreach($actividadEspecificas as $actividadEspecifica)
                <option>{{$actividadEspecifica->name}}</option>
                @endforeach
            </select>
        </div>

    </form>
</div>
</body>
</html>
