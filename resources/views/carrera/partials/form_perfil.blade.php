


@yield('campos_extras')

@include('carrera.partials.form')
 <div class="row">
        <div class="form-group   {{ ( $errors->has('materias_aprobadas') )?   'has-error' : ''}}   ">  
            <label for="materias_aprobadas" class="control-label col-sm-3">Materias Aprobadas </label>
            <div class="col-sm-6">
                <input type="number" min="0" max="{{$carrera->cantidad_materias}}" class="form-control" name="materias_aprobadas" id="materias_aprobadas" placeholder="Cantidad" value="{{ (Session::has('errors')) ? old('materias_aprobadas', '') : ( isset($persona)? $persona->materias_aprobadas : null ) }}" >
                @if ($errors->has('materias_aprobadas')) 
                    @foreach ( $errors->get('materias_aprobadas') as $error )
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                    @endforeach              
                @endif
            </div>
        </div>
    </div>