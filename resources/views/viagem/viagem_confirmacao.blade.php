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
		<form id="form" class="login100-form validate-form" method="post" action="{{ url('viagens/cadastrar') }}">
			{{ csrf_field() }}
			<span class="login100-form-title p-b-40">
				Nova Viagem - Confirmação
			</span>


			<div class="wrap-input100 m-b-16 m-t-16">
				<input class="input100" type="text" value="De: {{$request->dsOrigem}}" readonly>
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100" data-validate="" id="divNmPlacaVeiculo">
				<input class="input100" type="text" value="Para: {{$request->dsDestino}}" readonly>
				<span class="focus-input100"></span>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-t-16">
						<input class="input100" type="text" value="Duração: {{$request->dsTempoInfo}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-t-16">
						<input class="input100" type="text" value="Distância: {{$request->dsDistanciaInfo}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16 m-t-16">
						<input class="input100" type="text" value="Total de Gastos: R$ {{$request->dsGastos}}" readonly>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16 m-t-16">
						<input class="input100" type="text" value="Veículo: {{$request->nmPlacaVeiculo}}" readonly>
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
							placeholder="Prazo - Data" required>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" maxlength="5" type="text" name="hrPrazo" id="hrPrazo"
							placeholder="Prazo - Hora" required>
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" type="text" name="dsValorInfo" id="dsValorInfo" maxlength="14"
							onkeyup="calculaLucro()" placeholder="Valor da Viagem" required>
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="">
						<input class="input100" type="text" name="dsLucroInfo" id="dsLucroInfo" placeholder="Lucro" readonly>
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
						<button type="button" class="login100-form-btn wrap-input100" onclick="finalizaViagem()">
							Agendar Viagem
						</button>
					</div>
				</div>
			</div>

			<input type="hidden" name="idUsuario" id="idUsuario"
				value="@if (Session::has('usuario')){{Session::get('usuario')->id}}@endif">

			<input type="hidden" name="idVeiculo" id="idVeiculo" value="{{$request->veiculo}}">	

			<input type="hidden" name="idViagem" id="idViagem" value="">
			<input type="hidden" name="dsGastos" id="dsGastos" value="{{$request->dsGastos}}">			

			<input type="hidden" name="dsOrigemLat"  id="dsOrigemLat"  value="{{$request->dsOrigemLat}}">
			<input type="hidden" name="dsOrigemLng"  id="dsOrigemLng"  value="{{$request->dsOrigemLng}}">
			<input type="hidden" name="dsDestinoLat" id="dsDestinoLat" value="{{$request->dsDestinoLat}}">
			<input type="hidden" name="dsDestinoLng" id="dsDestinoLng" value="{{$request->dsDestinoLng}}">

			<input type="hidden" name="dsDistancia" id="dsDistancia" value="{{$request->dsDistancia}}">
			<input type="hidden" name="dsTempo" id="dsTempo" value="{{$request->dsTempo}}">

			<input type="hidden" name="dsLucro" id="dsLucro" value="">
			<input type="hidden" name="dsValor" id="dsValor" value="">

			<input type="hidden" name="dsStatus" id="dsStatus" value="P">
		</form>
	</div>
</div>



@endsection

@section('importacoes')
<script src="{{ asset('js/viagem/cadastro.js') }}"></script>
@endsection