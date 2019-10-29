@extends('layouts.app')

@section('titulo')
Viagens
@endsection

@section('css')

@endsection

@if(!Session::get('logado'))
<script>
	window.location = '{{url('usuarios/login')}}';
</script>
@endif
  
  

@section('conteudo')



@extends('layouts.menu')

<div class="container-login100" style="align-items: stretch">
						<select onchange="grafico()" name="timeSpam" id="timeSpam" class="input100"
							style="border: none; outline: 0px;">
							<option value="0" selected="selected">Sempre</option>
							<option value="1" selected="selected">Anual</option>
							<option value="2" selected="selected">Mensal</option>
						</select>
						<span class="focus-input100"></span>
    <div id="chartContainer" style="height: 450px; width: 98%;"></div>
<input type="hidden" id="cpfUsuario" value="@if (Session::has('usuario')){{Session::get('usuario')->cdCpfUsuario}}@endif">

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection



@section('importacoes')
<script src="{{ asset('js/graph.js') }}"></script>
@endsection