@extends('layouts.appAce')

@section('title','Perfil de Carrera')                   
                  

@section('title','Perfil')

@section('content')
 <form action="{{  route('update.materias',$user->id  ) }}" method="POST" lang="es" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $user->persona->nombre_apellido }} <small>  Editar 
        <span class="label label-xlg label-warning arrowed-right">Ver</span>
                                    </small>
                                    </h3>
        </div>
        <div class="panel-body">
           
                
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
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
                    