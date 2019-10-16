@extends('layouts.app')

@section('titulo')
	Cadastro
@endsection

@section('conteudo')
	<div class="container-login100">
		<div class="wrap-login100 p-t-90 p-b-30" style="width: 640px" >
		<form id="form" class="login100-form validate-form" method="post" action="{{ url('/usuarios/cadastrar') }}">
				{{ csrf_field() }}
				<span class="login100-form-title p-b-40">
					Novo Usuário
				</span>

				<div class="container-login100-form-btn">
					<a href="#" class="btn-login-with bg1 m-b-10" style="width: 50%" >
						<i class="fa fa-facebook-official"></i>
						Cadastrar com Facebook
					</a>
				</div>

				<div class="text-center p-t-25 p-b-30">
					<span class="txt1">
						Cadastrar com CPF
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate="Entre com o Nome Completo">
						<input class="input100" type="text" name="nmUsuario" id="nmUsuario" maxlength="100" placeholder="Nome Completo">
						<span class="focus-input100"></span>
				</div>

				<div class="row">
					<div class="col-sm">
						<div class="wrap-input100 validate-input m-b-16 col-sm" data-validate="Entre com o CPF">
							<input class="input100" type="text" name="cdCpfUsuario" id="cdCpfUsuario" maxlength="14" placeholder="CPF">
							<span class="focus-input100"></span>
						</div>
					</div>
					<div class="col-sm">
						<div class="wrap-input100 validate-input m-b-16 col-sm" data-validate="Entre com a Data de Nascimento">
							<input class="input100" type="text" name="dtNascimentoUsuario" id="dtNascimentoUsuario" maxlength="10" placeholder="Data de Nascimento">
							<span class="focus-input100"></span>
						</div>
					</div>
				</div>				

				<div class="wrap-input100 validate-input m-b-16" data-validate="Entre com o Telefone">
						<input class="input100" type="text" name="nrTelefoneUsuario" id="nrTelefoneUsuario" maxlength="14" placeholder="Telefone">
						<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate="Entre com o E-mail: ex@abc.xyz">
					<input class="input100" type="text" name="dsEmailUsuario" id="dsEmailUsuario" maxlength="100" placeholder="E-mail">
					<span class="focus-input100"></span>
				</div>

				<div class="row">
						<div class="col-sm">
							<div id="senhaDiv" class="wrap-input100 validate-input m-b-20" data-validate = "Entre com a Senha">
								<span class="btn-show-pass">
									<i class="fa fa fa-eye"></i>
								</span>
								<input class="input100" type="password" name="nmSenhaUsuario" id="nmSenhaUsuario" placeholder="Senha">					
								<span class="focus-input100"></span>
							</div>	
						</div>
						<div class="col-sm">
							<div class="wrap-input100 validate-input m-b-20" data-validate = "Entre com a Senha">
								<span class="btn-show-pass">
									<i class="fa fa fa-eye"></i>
								</span>
								<input class="input100" type="password" name="nmSenhaUsuarioC" id="nmSenhaUsuarioC" placeholder="Confirmar Senha">					
								<span class="focus-input100"></span>
							</div>
						</div>
				</div>			

				<div class="container-login100-form-btn">
					<button type="button" class="login100-form-btn" onclick="valida()">
						Proximo Passo
					</button>
				</div>
				
				<div class="flex-col-c p-t-224">
					<span class="txt2 p-b-10">
						Já possui uma conta?
					</span>

					<a href="{{ url('usuarios') }}" class="txt3 bo1 hov1">
						Entrar Agora
					</a>
				</div>
				
			</form>
		</div>
	</div>

	

@endsection

@section('importacoes')
	<script src="../js/usuario/cadastro.js"></script>
@endsection
