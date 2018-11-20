
<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('email') )?   'has-error' : ''}}   ">  
        <label for="email" class="control-label col-sm-3"> Email <sup>*</sup> </label>
        <div class="col-sm-6">
           <input type="email" name="email" id="email" class="form-control email-udc" placeholder="Email" value="{{  ( Session::has('errors') ) ?  old('email', null ) : ( isset($user)?  $user->email : null )   }}" required pattern="[a-z0-9._%+-]+@udc.edu.ar"> 
            @if ($errors->has('email')) 
                @foreach ( $errors->get('email') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>

@include('usuario.partials.form')

@if( !Auth::user()->hasRole('Estudiante'))

    <div class="row">
    <div class="form-group   {{ ( $errors->has('carrera_id') )?   'has-error' : ''}}   ">  
        <label for="carrera_id" class="control-label col-sm-3"> Carrera <sup>*</sup></label>
        <div class="col-sm-6">

            <select name="carrera_id" id="carrera_id" placeholder="Carrera" class="form-control">

                 @foreach ($carreras+[ '' => 'Seleccione Carrera'] as  $id => $carrera )
                    
                    <option value="{{ $id }}"  
                    
                    {{--  si hay error--}}
                    @if(  Session::has('errors')  ) 

                     {{-- selecciona la ultima carrera --}}
                        @if ( old('carrera_id', null) == $id )
                                selected
                        @endif

                    @else 
                    {{--  si hay persona y no error --}}
                        @if(  isset($persona  ) )
                            {{--  el valor de la persona --}}
                            @if( $id == $persona->carrera_id )
                                    selected
                            @endif

                            
                        @endif

                    @endif
                    
                    >   {{  $carrera }} </option>

                @endforeach
            
            
                </select>
                      
                @if ($errors->has('carrera_id')) 
                    @foreach ( $errors->get('carrera_id') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach
                @endif     
                     
            </div>
        </div>
    </div>

   

    
</div>


@endif  