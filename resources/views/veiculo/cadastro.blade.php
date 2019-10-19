@extends('layouts.app')

@section('titulo')
	Cadastro
@endsection



@section('conteudo')
	<div class="container-login100">
		<div class="wrap-login100 p-b-30"  style="width: 640px" >
		<form id="form" class="login100-form validate-form" method="post" action="{{ url('/veiculos/cadastrar') }}">
				{{ csrf_field() }}
				<span class="login100-form-title p-b-40">
					Veículos
				</span>

				<div class="text-center p-t-25 p-b-30">
						<span class="txt1">
							Meu(s) Veículo(s)
						</span>
				</div>

				<div class="row">
				<table id="tabelaVeiculo" class="container-login100-form-btn">	</table>
				</div>

				<div class="text-center p-t-25 p-b-30">
					<span class="txt1">
						Cadastrar Veículo(s)
					</span>
				</div>

				<div class="row">
					<div class="col-sm">
							<div class="wrap-input100 m-b-16" data-validate="" id="divNmPlacaVeiculo">
									<input class="input100" type="text" name="nmPlacaVeiculo" id="nmPlacaVeiculo"  placeholder="Placa">
									<span class="focus-input100"></span>
							</div>
					</div>
					<div class="col-sm">
							<div class="wrap-input100  m-b-16" data-validate="" id="divDsConsumoVeiculo">
									<input class="input100" type="text" name="dsConsumoVeiculo" id="dsConsumoVeiculo" maxlength="5" placeholder="Consumo em km/l">
									<span class="focus-input100"></span>
							</div>
					</div>
					
				</div>

				<div class="row">
						<div class="col-sm">
								<div class="wrap-input100  m-b-16" data-validate="" id="divMarca">
										<!-- <input class="input100" type="combobox" name="idMarca" placeholder="Marca"> -->
										<select name="marca" id="marca" class="input100" style="border: none; outline: 0px;" >
											<option value="" selected="selected" >Marca</option>
												@foreach ($marcas as $marca) {
													<option value='{{$marca->id}}' >{{$marca->nmMarca}}</option>
												@endforeach											
										</select>
										<span class="focus-input100"></span>
								</div>
						</div>
						<div class="col-sm">
								<div class="wrap-input100  m-b-16" data-validate="" id="divModelo">
									<select name="modelo" id="modelo" class="input100" style="border: none; outline: 0px;">
										<option value="" selected="selected" >Modelo</option>										
									</select>
										<span class="focus-input100"></span>
								</div>
						</div>
						<div class="col-sm">
								<div class="wrap-input100  m-b-16" data-validate="" id="divAnoVeiculo">
								<input class="input100" type="tel" type="text" name="anoVeiculo" id="anoVeiculo" placeholder="Ano">
										<span class="focus-input100"></span>
								</div>
						</div>
				</div>
				

				<div class="container-login100-form-btn">
					<div class="row">
						<div class="col-sm p-t-5" id="divBtnAdicionar">
								<button type="button"  class="login100-form-btn wrap-input100" onclick="adicionarVeiculo()">
										Adicionar +
								</button>
						</div>		
						<div class="col-sm p-t-5" id="divBtnAtualizar" style="display: none">
								<button type="button" id="btnAtualizar" class="login100-form-btn wrap-input100"  onclick="editarVeiculo(this)">
										Editar
								</button>
						</div>					
						<div class="col-sm p-t-5">
								<button type="button" class="login100-form-btn wrap-input100"  onclick="finalizaVeiculos()">
										Finalizar
								</button>
						</div>
						
					</div>
				</div>

			</form>
		</div>
	</div>

	

@endsection

@section('importacoes')
	<script src="{{ asset('js/veiculo/veiculo.js') }}"></script>
@endsection
