

@section('campos_extras')

<div class="row">
  <div class="form-group">
    <label for="rol" class="control-label col-sm-3"> Rol </label>
    <div class="col-sm-6">
       
        <p class="text-show"> {{ $user->rol }} </p>
                    
    </div>
  </div>
</div>

@endsection

@include('usuario.partials.show_perfil')
