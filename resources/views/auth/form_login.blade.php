

           

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" style="margin-top:10%;">
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
        <label class="control-label bolder blue">Recuerdame</label>
            <div class="checkbox">
                <label>
                    <input name="recuerdame" type="checkbox" class="ace" {{ old('recuerdame') ? 'checked' : '' }}> 
                <span class="lbl" style="bottom: 31px; left: 119px;"></span>
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
                      