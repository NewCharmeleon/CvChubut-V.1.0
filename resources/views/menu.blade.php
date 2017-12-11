
@section('menu')

      <div class="panel panel-default">
        @role('administrador')
        <div class="panel-heading">Tablero de {{$rol='Administrador'}}</div>

        <div class="" style="margin-left:15px;">
          <div class="row">
            <a class="link btn btn-default" href="{{ url('api/v1.0/usuarios') }}"> <i class="glyphicon glyphicon-user"></i>Usuarios</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/personas') }}"> <i class="glyphicon glyphicon-user"></i>Personas</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
            <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
        </div>
          @endrole
          @role('operador')
          <div class="panel-heading">Tablero de {{$rol='Operador de Sistema'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/personas') }}"> <i class="glyphicon glyphicon-user"></i>Personas</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
          </div>
          @endrole
          @role('secretaria')
          <div class="panel-heading">Tablero de {{$rol='Secretaria'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
          </div>
          @endrole
          @role('estudiante')@elsif @role('oferente')@elsif||@role('referente')
          <div class="panel-heading">Tablero de {{$rol='usuario'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
          </div>
          @endrole



@endsection
