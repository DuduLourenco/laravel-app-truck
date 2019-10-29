@extends('layouts.app')

@section('titulo')
Viagens
@endsection

@section('css')
<!-- <link href="{{ asset('api/api.css') }}" rel="stylesheet"> -->
@endsection

@if(!Session::get('logado'))
<script>
	window.location = '{{url('usuarios/login')}}';
</script>
@endif


@section('conteudo')

@extends('layouts.menu')
    <h1>Cofrinho da manutenção</h1>


@endsection

@section('importacoes')
<script src="{{ asset('js/viagem/cofrinho.js') }}"></script>
@endsection
