<div class="">

<h4> Oferentes </h4>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Actividad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($oferentes as $id => $oferente)
      <tr>
        <td>{{ $oferente->id }}</td>
        <td>{{ $oferente->persona_id }}</td>
        <td>{{ $oferente->actividad_id}}</td>
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
