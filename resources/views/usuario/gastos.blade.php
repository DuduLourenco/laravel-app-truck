@extends('layouts.app')

@section('titulo')
Viagens
@endsection

@section('css')

@endsection

<script src="{{ asset('js/canvasjs.min.js') }}"></script>
@if(!Session::get('logado'))
<script>
	window.location = '{{url('usuarios/login')}}';
</script>
@endif



@section('conteudo')
<span class="login100-form-title p-t-40 container-login100" style="min-height: 0">
	Gastos
</span>
<div id="chartContainer" style="height:30%; width: 100%;"></div>
<div class="container-login100" style="align-items: stretch">
<div class="wrap-login100 p-b-30 p-45" style="width: 640px">
	
<form id="form" class="login100-form validate-form" method="postS" action="{{ url('/usuarios/registraGasto') }}">



            {{ csrf_field() }}
            
			<span class="login100-form-title p-b-40">
				Registrar Gasto
			</span>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16" data-validate="" id="divdsValor">
						<input class="input100" type="text" name="dsValor" id="dsValor"
							placeholder="Valor">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100  m-b-16" data-validate="" id="divdtGasto">
						<input class="input100" type="date" name="dtGasto" id="dtGasto" maxlength="5"
							placeholder="Data">
						<span class="focus-input100"></span>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100  m-b-16" data-validate="" id="divManutenção">
						<select name="dsTipo" id="dsTipo" class="input100"
							style="border: none; outline: 0px;">
							<option value="Manutencao" selected="selected">Manutenção</option>
							<option value='Estadia'> Estadia </option>
							<option value='Alimentacao'> Alimentação </option>
							<option value='Combustivel'> Combustível </option>
							<option value='Pedagio'> Pedágio </option>
							<option value='Outro'> Outro </option>
							
						</select>
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>
            <input type="hidden" id="cpfUsuario" name="cpfUsuario" value="@if (Session::has('usuario')){{Session::get('usuario')->cdCpfUsuario}}@endif">


			<div class="container-login100-form-btn">
				
					<div class="col-sm p-t-5">
						<button type="button" class="login100-form-btn wrap-input100" onclick="finalizaGastos()">
							Finalizar
						</button>
					</div>

				</div>
			</div>
			<input type="hidden" id="idUsuario" value="@if (Session::has('usuario')){{Session::get('usuario')->id}}@endif">
			<input type="hidden" id="idVeiculo" value="">
		</form>
	</div>
    </div>
@extends('layouts.menu')




@endsection



@section('importacoes')

<script src="{{ asset('js/gastos.js') }}"></script>

@endsection
