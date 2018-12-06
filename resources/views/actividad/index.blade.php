@extends('layouts.appAce')

@section ('title', 'Actividades')
@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap4-1-3.min.css') }}">
    <style>
    .main-content, body, html {
    min-height: 266vh !important;
    }
    </style>
    
    <script src="{{ asset('assets/js/bootstrap4-1-3.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>

@endsection
@section ('content')
    
    @include('actividad.partials.content')

@endsection

