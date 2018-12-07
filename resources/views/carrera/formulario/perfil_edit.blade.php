@extends('layouts.appAce')
@section('title','Perfil de Carrera')

@section('content')
 <form action="{{ route('update.materias',$user->id ) }}" method="POST" lang="es" class="form-horizontal">
    {{ csrf_field() }}
  {{ method_field('PUT') }}
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $user->persona->nombre_apellido }} <h3>  Perfil de Carrera 
            </i>
									<span class="label label-xlg label-warning arrowed-right">Editar</span>
                                    </small>
                                    </h3>
        </div>
        <div class="panel-body">
           
                 <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- bandera que sirve para redirigir al perfil -->
                <input type="hidden" name="perfil" value="true">
                
                    
                   @role(['Secretaria','Administrador'])
                   
                        @include('carrera.partials.form')
                        
                        
                    @endrole

                    @role(['Estudiante'])

                       @include('carrera.partials.form_perfil')  
                    @endrole 
                    
                            
               
           
        </div>
        <div class="panel-footer">
             <a class="btn btn-primary" href="{{ url('/')}}"> Volver </a>  
            <button type="submit" class="btn btn-success"> Guardar </button>
            <a class="btn btn-warning" href="{{ route('carrera.perfil') }}"> Ver</a>
        </div>
    </div>    
 </form>
@endsection