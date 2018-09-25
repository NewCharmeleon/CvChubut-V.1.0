@extends('layouts.app')

@section ('title', 'Instituciones')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Instituciones</u></b></h4></caption>
      <a href="{{ route('institucion.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table class="table table-hover">
        
        <thead>
         <tr>
             <th>Nombre</th>
             <th>Localidad</th>
             <th>Provincia</th>
             <th>Pais</th>
             <th>Acciones</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($instituciones as $id => $institucion)
          <tr>
             
            
             <td>{{ $modalidad->nombre }}</td>
             <td>{{ $modalidad->localidad }}</td>
             <td>{{ $modalidad->provincia }}</td>
             <td>{{ $modalidad->pais }}</td>
             <td>
                  <a href="{{ route('instituciones.show',$institucion->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('instituciones.edit',$institucion->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('form-institucion-{{} $institucion->id}}').submit();">
                    <i class="glyphicon glyphicon-trash model-acction"> </i>
                  </a> 

                  <form action="{{ route('instituciones.destroy', $institucion->id) }}" method="POST" id="form-institucion-{{ $institucion->id}}" style="display:none">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }} 
                  </form>

             </td>
             
          </tr>  
          @endforeach
          @if ( $instituciones->count() == 0 )
            <tr>
                <td colspan="5" align="center">
                    <strong> No existen Instituciones registradas </strong>
                 </td>
            </tr>
          @endif          
        </tbody>
      </table>
      <div class="center">
        {{ $instituciones->links() }}
      </div>
      
   </div>

  </div>

@endsection

  