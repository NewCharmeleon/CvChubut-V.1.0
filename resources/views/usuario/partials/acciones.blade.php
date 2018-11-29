 <a href="{{ route('usuarios.show',$usuario->id) }}" > <i class="ace-icon fa fa-search-plus bigger-130"></i> </a>
<a href="{{ route('usuarios.edit',$usuario->id) }}" > <i class="ace-icon fa fa-pencil bigger-130 green"></i> </a>

<a href="#" onclick="event.preventDefault();document.getElementById('form-user-{{ $usuario->id }}').submit();">
<i class="ace-icon fa fa-trash-o bigger-130 red"></i>
</a>

<form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST" id="form-user-{{ $usuario->id }}">
<input type="hidden" name="_method" value="delete">
    {{ csrf_field() }}
</form>             