<div class="row">
    <div class="form-group has-feedback  {{ ( $errors->has('email') )?   'has-error' : ''}}   ">  
        <label for="email" class="control-label col-sm-3"> Email <sup>*</sup> </label>
        <div class="col-sm-6">
           <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{  ( Session::has('errors') ) ?  old('email', null ) : ( isset($user)?  $user->email : null )   }}" required > 
            @if ($errors->has('email')) 
                @foreach ( $errors->get('email') as $error )
                    <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        {{ $error }}  <i class="glyphicon glyphicon-remove close-error"></i>
                @endforeach              
            @endif
        </div>
    </div>
</div>


@yield('campos_extras')

@include('usuario.partials.form')