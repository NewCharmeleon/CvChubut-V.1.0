@extends('layouts.app')

@section ('title', 'Modalidades')
  
@section ('content')

  <div class="panel panel-default ">
    <div class="panel-body">
    
      <caption><h4><b><u>Listado de Modalidades</u></b></h4></caption>
      <a href="{{ route('modalidades.create')  }}" class="btn btn-primary">  Nueva  </a>

      <table id='datatable' class="table table-hover">
        
        <thead>
         <tr>
             <th>Nombre</th>
             <th>Descripci&oacute;n</th>
             <th>Acciones</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($modalidades as $id => $modalidad)
          <tr>
             
            
             <td>{{ $modalidad->nombre }}</td>
             <td>{{ $modalidad->descripcion }}</td>
             <td>
                  <a href="{{ route('modalidades.show',$modalidad->id) }}" > <i class="glyphicon glyphicon-eye-open model-acction"></i> </a>
                  <a href="{{ route('modalidades.edit',$modalidad->id) }}" > <i class="glyphicon glyphicon-edit model-acction" ></i></a>
             </td>
             
          </tr>  
          @endforeach
        </tbody>
      </table>
      <div class="center">
        {{ $modalidades->links() }}
      </div>
      
   </div>

  </div>

@endsection