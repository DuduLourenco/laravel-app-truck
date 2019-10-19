@extends('layouts.app')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/materialdashboard/css/material-dashboard.css') }}">
@endsection

@if(!Session::get('logado')) 
	<script>window.location = '{{url('usuarios/login')}}';</script>
@endif

@section('conteudo')

@extends('layouts.menu')



@endsection

@section('importacoes')
  <script src="{{ asset('vendor/materialdashboard/js/material-dashboard.js') }}"></script>
@endsection