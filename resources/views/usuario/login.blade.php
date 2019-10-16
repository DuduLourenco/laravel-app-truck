@extends('layouts.app')

@section('titulo')
	Entrar
@endsection

@section('conteudo')
	<div class="container-login100">
		<div class="wrap-login100 p-t-90 p-b-30">
		<form class="login100-form validate-form" method="post" action="{{ url('/usuarios/entrar') }}">
				{{ csrf_field() }}
				<span class="login100-form-title p-b-40">
					Login
				</span>

				<div>
					<a href="#" class="btn-login-with bg1 m-b-10">
						<i class="fa fa-facebook-official"></i>
						Entrar com Facebook
					</a>
				</div>

				<div class="text-center p-t-25 p-b-30">
					<span class="txt1">
						Entrar com CPF
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate="Entre com o CPF">
					<input class="input100" type="text" maxlength="14" name="cdCpfUsuario" id="cdCpfUsuario" placeholder="CPF">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate = "Entre com a Senha">
					<span class="btn-show-pass">
						<i class="fa fa fa-eye"></i>
					</span>
					<input class="input100" type="password" maxlength="20" name="cdSenhaUsuario" id="cdSenhaUsuario" placeholder="SENHA">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Entrar
					</button>
				</div>

				<div class="container-login100-form-btn">	
						<span class="txt2 p-b-10" style="margin-top: 0.5em">
								<a href="#" class="bo1 hov1">
									Esqueci minha senha
								</a>								
						</span>
				</div>
				
				<div class="flex-col-c p-t-224">
					<span class="txt2 p-b-10">
						Não possui uma conta?
					</span>

					<a href="{{ url('usuarios\cadastro') }}" class="txt3 bo1 hov1">
						Cadastre-se
					</a>
				</div>
				
			</form>
		</div>
	</div>
@endsection