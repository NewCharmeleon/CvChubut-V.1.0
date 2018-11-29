<a href="{{ route('experiencias.laborales.show',$experiencia_laboral->id )  }}"   ><i class="ace-icon fa fa-search-plus bigger-130"></i></a>
<a href="{{  route('experiencias.laborales.edit',$experiencia_laboral->id )   }}" ><i class="ace-icon fa fa-pencil bigger-130 green"></i></a>


<a href="#" onclick="event.preventDefault();document.getElementById('form-experiencia-laboral-{{ $experiencia_laboral->id }}').submit();"> 
    <i class="ace-icon fa fa-trash-o bigger-130 red" ></i>
</a>


<form action="{{ route('experiencias.laborales.destroy',$experiencia_laboral->id)  }}"  method="POST" id="form-experiencia-laboral-{{ $experiencia_laboral->id }}" style="display:none">
<input type="hidden" name="_method" value="delete">
{{ csrf_field() }}
</form>

                  