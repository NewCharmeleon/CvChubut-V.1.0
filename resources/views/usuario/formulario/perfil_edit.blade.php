@extends('layouts.app')
@section('title','Perfil')

@section('content')
 <form action="{{  route('usuarios.update', $user->id )      }}" method="POST" lang="es" class="form-horizontal">
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">  {{ $user->persona->nombre_apellido }} <small>  Perfil  </small> </h3>
        </div>
        <div class="panel-body">
           
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- bandera que sirve para redirigir al perfil -->
                <input type="hidden" name="perfil" value="true">
                
                    
                   @role(['Secretaria','Administrador'])
                   
                        @include('usuario.partials.form_perfil')
                        
                        
                    @endrole

                    @role(['Estudiante'])

                       @include('usuario.partials.form')  
                    @endrole 
                    
                            
               
           
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ url('/') }}"> Volver</a>
            <button type="submit" class="btn btn-success"> Guardar </button>
            <a class="btn btn-warning" href="{{ route('perfil') }}"> Ver</a>
        </div>
    </div>    
 </form>
@endsection