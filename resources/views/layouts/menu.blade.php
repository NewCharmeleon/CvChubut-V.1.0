
        @role('admin')
        <div>
           <div class="panel-heading">Tablero de {{$rol='Administrador'}}</div> 
            <div class="row" style="margin-left:15px;">
          
             <a class="link btn btn-default" href="{{ url('v1.0/usuarios') }}"> <i class="glyphicon glyphicon-user"></i>Usuarios</a>
             <a class="link btn btn-default" href="{{ url('v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
             <a class="link btn btn-default" href="{{ url('v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
             <a class="link btn btn-default" href="{{ url('v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
              <a class="link btn btn-default" href="{{ url('v1.0/actividadesTipo') }}"> <i class="glyphicon glyphicon-education"></i>Tipo de Actividades</a>
              <a class="link btn btn-default" href="{{ url('v1.0/actividades') }}"><i class="glyphicon glyphicon-education"></i>Actividades Generales</a>
              <a class="link btn btn-default" href="{{ url('v1.0/actividadesEspecifica') }}"> <i class="glyphicon glyphicon-education"></i>Actividades Especificas</a>
            </div>
        </div>
    </div>
        @endrole

        @role('operador')
        <div class="panel-heading">Tablero de {{$rol='Operador'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/personas') }}"> <i class="glyphicon glyphicon-user"></i>Personas</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
            </div>
        @endrole

        @role('secretaria')
        <div class="panel-heading">Tablero de {{$rol='Secretaria UDC'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
            </div>
        @endrole

        @role('estudiante')
        <div class="panel-heading">Tablero de {{$rol='Estudiante'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
            </div>
        @endrole

        @role('referente')
        <div class="panel-heading">Tablero de {{$rol='Referente'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/oferentes') }}"> <i class="glyphicon glyphicon-user"></i>Oferentes</a>
            </div>
        @endrole

        @role('oferente')
        <div class="panel-heading">Tablero de {{$rol='Oferente'}}</div>
          <div class="" style="margin-left:15px;">
            <div class="row">
              <a class="link btn btn-default" href="{{ url('api/v1.0/estudiantes') }}"> <i class="glyphicon glyphicon-user"></i>Estudiantes</a>
              <a class="link btn btn-default" href="{{ url('api/v1.0/referentes') }}"> <i class="glyphicon glyphicon-user"></i>Referentes</a>
            </div>
        @endrole


