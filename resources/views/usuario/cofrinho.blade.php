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

<link rel="stylesheet" type="text/css" href="{{ asset('css/cofrinho.css') }}">

<div class="text-center bg-light p-3">
    <h2 >Cofrinho da manutenção</h2>
        <div class="align-top">
            <div class="piggy-wrapper">
                <div class="piggy-wrap">
                    <div class="piggy">
                        <div class="nose"></div>
                        <div class="mouth"></div>
                        <div class="ear"></div>
                        <div class="tail">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="eye"></div>
                        <div class="hole"><h1 class="valor">R${{Session::get('usuario')->dsValorCofrinho}}</h1></div>
                    </div>
                </div>
                <div class="coin-wrap">
                    <div class="coin">R$</div>
                </div>
                <div class="legs"></div>
                <div class="legs back"></div>

    <button type="button" class="btn btn-success btn-lg">Depositar</button>
<button type="button" class="btn btn-danger btn-lg">Retirar</button>
            </div>
        </div>
</div>


<!-- Portifolio: https://themeforest.net/user/ig_design/portfolio -->
    <a href="https://themeforest.net/user/ig_design/portfolio"      class="link-to-portfolio cursor-link" target=”_blank”       ></a>
@endsection

@section('importacoes')
<script src="{{ asset('js/cofrinho.js') }}"></script>
@endsection
