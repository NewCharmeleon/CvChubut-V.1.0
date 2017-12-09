<div class="">

<h4> Usuarios:Index </h4>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Rol</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $id => $usuario)
      <tr>
        <td>{{ $usuario->username }}</td>
        <td>{{ $usuario->role->display_name }}</td>
        <td>
          <button type="button"  class="btn btn-sm btn-danger click" value="{{ $id }}" name="button">Seleccionar</button>
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
