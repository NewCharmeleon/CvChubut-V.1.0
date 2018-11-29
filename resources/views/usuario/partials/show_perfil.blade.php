
<br><br>
<div class="row">
  <div class="form-group">
    <label for="email" class="control-label col-sm-3"> Email </label>
    <div class="col-sm-6">
        <p class="text-show"> {{ $user->email }} </p>
    </div>
  </div>
</div>

@yield('campo_extra')

@include('usuario.partials.show')  <br><br><br>
