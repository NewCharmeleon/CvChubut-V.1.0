<div class="">

<h4> Usuarios </h4>
@section('styles')
    <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
   <link rel="stylesheet"  href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

@section('scripts')
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
       
    
   $(document).ready(function() {
        $('#data-table').DataTable( {
            
            //"dom": '<"top"i>rt<"bottom"flp><"clear">',
            "ordering": true,
            "pagingType": "full_numbers",
            "language": {
                "search": "Búsqueda",
                "lengthMenu": "Mostrando _MENU_ items por página",
                "zeroRecords": "No hay datos para mostrar",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No existen datos disponibles",
                "infoFiltered": "(filtrando datos de un _MAX_ total de items)",
                "paginate": {
                    "first": "Primera página",
                    "previous": "Previa",
                    "next": "Siguiente",
                    "last": "Última página",
                }
            }
             
   
        });
    }); 

            /*$('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/api/carreras", 
                columns: [
                { data: 'nombre' },
                { data: 'cantidad_materias ' },
                { data: 'acciones' }
            ]
            });
           
        });*/
        //} );
    </script>
@endsection  
<table class="table table-striped table-bordered table-hover" role="grid" style="width:100%" id="data-table">
      
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Rol</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $id => $usuario)
      <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->username }}</td>
        <td>{{ $usuario->role}}</td>
        <td>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Crear</button>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Editar</button>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Eliminar</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>









</div>





<script type="text/javascript">
  $(function ($) {


    var usuarios= <?php echo json_encode($usuarios ); ?>;
//esto por ajax con botones dependiendo del usuario y mostrarlo
    $('tbody').click('tr td .click',function (e) {
      e.preventDefault();
       var id = e.target.value;
       alert( usuarios[id].username );
       usuarios.splice(id,1);
//esto arma los botones con javascript y la informacion
       $('tbody').empty();
       $('tbody').append(
          usuarios.map(function ( usuario,key) {
            return "<tr><td>"+usuario.username+"</td><td><button type='button'  class='btn btn-sm btn-danger click' value='"+key+"' name='button'>Seleccionar</button></td></tr>"
          }).toString()

       );

    });



  });
</script>
