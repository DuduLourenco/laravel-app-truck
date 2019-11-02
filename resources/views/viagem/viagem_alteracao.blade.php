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
		<form id="form" class="login100-form validate-form" method="post" action="{{ url('viagens/alterar') }}">
			{{ csrf_field() }}
			<span class="login100-form-title p-b-40">
				Viagem - Alterar
			</span>


			<div class="wrap-input100 m-b-16 m-t-16">
				<input class="input100" type="text" id="dsOrigem" value="De: {{$viagem->dsOrigem}}" readonly>
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100" data-validate="" id="divNmPlacaVeiculo">
				<input class="input100" type="text" id="dsDestino" value="Para: {{$viagem->dsDestino}}" readonly>
				<span class="focus-input100"></span>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-t-16">
						<input class="input100 text-warning bg-dark" type="text" id="dsTempoInfo" value="Duração: {{$viagem->dsTempoInfo}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-t-16">
						<input class="input100 text-warning bg-dark" type="text" id="dsDistanciaInfo" value="Distância: {{$viagem->dsDistanciaInfo}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16 m-t-16">
						<input class="input100 text-warning bg-dark" type="text" id="dsGastosInfo" value="Total de Gastos: R$ {{$viagem->dsGastos}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16 m-t-16">
						<input class="input100" type="text" id="nmPlacaVeiculo" value="Veículo: {{$viagem->nmPlacaVeiculo}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="text-center p-t-25 p-b-30">

				<span class="txt1">
					Dados da Viagem
					<br>
					<span class="txt2">
						Preencha as Dados 
					</span>
				</span>
				
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" maxlength="10" type="text" name="dtPrazo" id="dtPrazo"
							placeholder="Prazo - Data" value="{{ Carbon\Carbon::parse($viagem->dtPrazo)->format('d/m/Y')}}" >
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" maxlength="5" type="text" name="hrPrazo" id="hrPrazo"
							placeholder="Prazo - Hora" value="{{$viagem->hrPrazo}}">
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" type="text" name="dsValorInfo" id="dsValorInfo" maxlength="14"
							onkeyup="calculaLucro()" placeholder="Valor da Viagem" value="{{number_format($viagem->dsValor, 2)}}">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
					<input class="input100" type="text" name="dsLucroInfo" id="dsLucroInfo" placeholder="Lucro" value="R$ {{number_format($viagem->dsLucro, 2)}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm"></div>
				<div class="col-sm-6">
					<div class="wrap-input100 m-b-16" data-validate="" >
						<input class="input100" style="text-align: center" type="text" name="dsResultado" id="dsResultado"  readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm"></div>
			</div>

			<div class="container-login100-form-btn">
				<div class="row">
					<div class="col-sm p-t-5">
						<button type="button" class="login100-form-btn wrap-input100" onclick="alteraViagem()">
							Alterar Viagem
						</button>
					</div>
				</div>
			</div>

			<input type="hidden" name="idUsuario" id="idUsuario"
				value="@if (Session::has('usuario')){{Session::get('usuario')->id}}@endif">

			<input type="hidden" name="idVeiculo" id="idVeiculo" value="{{$viagem->idVeiculo}}">	

			<input type="hidden" name="idViagem" id="idViagem" value="{{$viagem->id}}">
			<input type="hidden" name="dsGastos" id="dsGastos" value="{{$viagem->dsGastos}}">			

			<input type="hidden" name="dsOrigemLat"  id="dsOrigemLat"  value="{{$viagem->dsOrigemLat}}">
			<input type="hidden" name="dsOrigemLng"  id="dsOrigemLng"  value="{{$viagem->dsOrigemLng}}">
			<input type="hidden" name="dsDestinoLat" id="dsDestinoLat" value="{{$viagem->dsDestinoLat}}">
			<input type="hidden" name="dsDestinoLng" id="dsDestinoLng" value="{{$viagem->dsDestinoLng}}">

			<input type="hidden" name="dsDistancia" id="dsDistancia" value="{{$viagem->dsDistancia}}">
			<input type="hidden" name="dsTempo" id="dsTempo" value="{{$viagem->dsTempo}}">

			<input type="hidden" name="dsLucro" id="dsLucro" value="{{$viagem->dsLucro}}">
			<input type="hidden" name="dsValor" id="dsValor" value="{{$viagem->dsValor}}">

			<input type="hidden" name="dsStatus" id="dsStatus" value="{{$viagem->dsStatus}}">
		</form>
	</div>
</div>



@endsection

@section('importacoes')
<script src="{{ asset('js/viagem/alteracao.js') }}"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQCnq0A9TueU4DKWoAtSONIXX-6kFLxys&libraries=places,directions&callback=initMap"
	async defer></script>
@endsection