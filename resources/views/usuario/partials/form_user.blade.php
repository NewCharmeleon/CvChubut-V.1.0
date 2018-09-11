

@section('campos_extras')

<div class="row">
  <div class="form-group {{ ( $errors->has('rol_id') )? 'has-error' : ''}}">
    <label for="rol_id" class="control-label col-sm-3"> Rol <sup>* </sup> </label>
    <div class="col-sm-6">
        <select class="form-control" name="rol_id" id="rol_id" placeholder="Roles" required>
            
            @foreach ($roles as $rol)
               <option value="{{ $rol->id }}" 

                    {{--Si hay algun Error--}}
                    @if ( Session::has('errors') )
                        {{--se selecciona la ultima nacionalidad --}}
                        @if ( old('rol_id', null) == $rol->id)
                            selected
                        @endif
                    @else
                    {{--Si existe el User y no hay error --}}
                        @if ( isset( $user )) 
                            
                            @if( $rol->id == $user->roles->first()->id ) 
                                    selected
                            @endif

                        @endif 

                    @endif
                    > {{ $rol->display_name }} </option>

            @endforeach                                     
        </select>
        
        @if ($errors->has('rol_id'))
            @foreach ( $errors->get('rol_id') as $error )

                <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    {{ $error }} <i class="glyphicon glyphicon-remove close-error"></i>
            @endforeach
        @endif               
    </div>
  </div>
</div>

@endsection

@include('usuario.partials.form_perfil')
