

           

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}


    <div class="form-group {{ $errors->has('username') ? ' has-error' : ''}}">
        <label for="username" class="col-md-3 control-label">Usuario</label>

        <div class="col-md-5">
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong> 
                    </span>
                @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('password') ? ' has-error' : ''}}">
        <label for="password" class="col-md-3 control-label">Contrase&ntilde;a
        </label>

        <div class="col-md-5">
            <input id="password" type="text" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong> 
                    </span>
                @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-3">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="recuerdame" {{ old('recuerdame') ? 'checked' : '' }}> Recuerdame
                </label>
            </div>
        </div>            
    </div>  

    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <button type="submit" class="btn btn-primary">
                Iniciar
            </button>
             
            <a class="" href="{{ url('/password/reset') }}">
                Olvidaste tu Contrase&ntilde;a?
            </a>    
        </div>
    </div>
</form>  
                      