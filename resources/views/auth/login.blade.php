@extends('layouts.appAce')
@section('title', 'Iniciar sesi&ocute;n  en Sistema Cv-Chubut')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Iniciar Sesi&ocute;n en Sistema CvChubut</div>
                <div class="panel-body">
                    @include('auth.form_login')
                </div>    
            </div>
        </div>
    </div>
</div>            

@endsection
