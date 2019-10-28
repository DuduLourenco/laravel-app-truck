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
    <div id="chartContainer" style="height: 300px; width: 94%;"></div>
    
</div>
<input type="hidden" id="cpfUsuario" value="@if (Session::has('usuario')){{Session::get('usuario')->cdCpfUsuario}}@endif">

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection



@section('importacoes')
<script src="{{ asset('js/graph.js') }}"></script>
@endsection