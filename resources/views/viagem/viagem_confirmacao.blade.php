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
	<div class="wrap-login100 p-b-30 p-t-45" style="width: 640px">
		<form id="form" class="login100-form validate-form" method="get" action="{{ url('/usuarios/login') }}">
			{{ csrf_field() }}
			<span class="login100-form-title p-b-40">
				Nova Viagem - Confirmação
			</span>			

			<div class="row">
				<table id="tabelaVeiculo" class="container-login100-form-btn">
				</table>
			</div>

			<div class="text-center p-t-25 p-b-30">
				<span class="txt1">
					Nova Viagem
				</span>
			</div>

			<div class="wrap-input100 m-b-16 m-t-16">
				<input class="input100" type="text" id="dsOrigem" placeholder="De">
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 m-b-16" data-validate="" id="divNmPlacaVeiculo">
				<input class="input100" type="text" name="dsDestino" id="dsDestino" placeholder="Para">
				<span class="focus-input100"></span>
			</div>			

			<div class="wrap-input100 m-b-16 m-t-16">
				<div id="map" class="input100 mx-auto" style="min-height: 340px;">



				</div>
			</div>

			<div class="text-center p-t-25 p-b-30">
				<span class="txt1" href="#" id="ancora">
					Informações
				</span>
				
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100  m-b-16" data-validate="" id="divMarca">
						<select onchange="calculaGasto()" name="veiculo" id="veiculo" class="input100"
							style="border: none; outline: 0px;">
							<option value="" selected="selected">Veículo</option>
							@foreach ($veiculos as $veiculo) {
							<option value='{{$veiculo->nmPlacaVeiculo}}'>{{$veiculo->nmPlacaVeiculo}}</option>
							@endforeach
						</select>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" type="text" name="dsTempo" id="dsTempo" placeholder="Tempo de Viagem"
							disabled="true">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" type="text" name="dsDistancia" id="dsDistancia"
							placeholder="Total de KM" disabled="true">
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						
						<input class="input100" type="text" name="dsGastoTotalInfo" id="dsGastoTotalInfo"
							placeholder="Gasto Total" disabled="true">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<button type="button" class="login100-form-btn wrap-input100" onclick="">
						Mais Informações
					</button>
				</div>
			</div>

			<div class="container-login100-form-btn">
				<div class="row">
					<div class="col-sm p-t-5">
						<button type="button" class="login100-form-btn wrap-input100" onclick="">
							Agendar Viagem
						</button>
					</div>
				</div>
			</div>

			<input type="hidden" id="idUsuario"
				value="@if (Session::has('usuario')){{Session::get('usuario')->id}}@endif">
			<input type="hidden" id="idViagem" value="">
			<input type="hidden" id="dsGastoTotal" value="">
		</form>
	</div>
</div>



@endsection

@section('importacoes')

@endsection