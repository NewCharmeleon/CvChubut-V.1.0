@extends('layouts.app')
@section('title', 'Iniciar sesi&ocute;n')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Iniciar Sesi&ocute;n</div>
                <div class="panel-body">
                    @include('auth.form_login')
                </div>    
            </div>
        </div>
    </div>
</div>            

@endsection
