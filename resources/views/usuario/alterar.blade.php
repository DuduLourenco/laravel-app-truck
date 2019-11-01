@extends('layouts.app')

@section('titulo')
Alterar
@endsection

@if(!Session::get('logado'))
<script>
	window.location = '{{url('usuarios/login')}}';
</script>
@endif

@section('conteudo')

@extends('layouts.menu')

<div class="container-login100">
	<div class="wrap-login100 p-t-45 p-b-30" style="width: 640px">
		<form id="form" class="login100-form validate-form" method="post" action="{{ url('usuarios/alterar') }}">
			{{ csrf_field() }}
			<span class="login100-form-title p-b-40">
				Perfil
			</span>

			<div class="text-center p-t-25 p-b-30">
				<span class="txt1">
					Cadastrar com CPF
				</span>
			</div>

			<div class="wrap-input100 m-b-16 {{$errors->has("nmUsuario") ? "alert-validate" : ""}}"
				data-validate="{{ $errors->has("nmUsuario") ? $errors->first("nmUsuario") : "" }}">
				<input class="input100" type="text" name="nmUsuario" id="nmUsuario" maxlength="100"
					placeholder="Nome Completo" value="{{Session::get('usuario')->nmUsuario}}">
				<span class="focus-input100"></span>
			</div>

			<div class="row">
				<div class="col-sm">
					<div class="wrap-input100 m-b-16 {{$errors->has("cdCpfUsuario") ? "alert-validate" : ""}}"
						data-validate="{{ $errors->has("cdCpfUsuario") ? $errors->first("cdCpfUsuario") : "" }}">
						<input class="input100" type="text" name="cdCpfUsuario" id="cdCpfUsuario" maxlength="14"
							placeholder="CPF" value="{{Session::get('usuario')->cdCpfUsuario}}">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-16 {{$errors->has("dtNascimentoUsuario") ? "alert-validate" : ""}}"
						data-validate="{{ $errors->has("dtNascimentoUsuario") ? $errors->first("dtNascimentoUsuario") : "" }}">
						<input class="input100" type="text" name="dtNascimentoUsuario" id="dtNascimentoUsuario"
							maxlength="10" placeholder="Data de Nascimento"
							value="{{Session::get('usuario')->dtNascimentoUsuario}}">
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="wrap-input100 m-b-16 {{$errors->has("nrTelefoneUsuario") ? "alert-validate" : ""}}"
				data-validate="{{ $errors->has("nrTelefoneUsuario") ? $errors->first("nrTelefoneUsuario") : "" }}">
				<input class="input100" type="text" name="nrTelefoneUsuario" id="nrTelefoneUsuario" maxlength="14"
					placeholder="Telefone" value="{{Session::get('usuario')->nrTelefoneUsuario}}">
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 m-b-16 {{$errors->has("dsEmailUsuario") ? "alert-validate" : ""}}"
				data-validate="{{ $errors->has("dsEmailUsuario") ? $errors->first("dsEmailUsuario") : "" }}">
				<input class="input100" type="text" name="dsEmailUsuario" id="dsEmailUsuario" maxlength="100"
					placeholder="E-mail" value="{{Session::get('usuario')->dsEmailUsuario}}">
				<span class="focus-input100"></span>
			</div>

			<div class="row">
				<div class="col-sm">
					<div id="senhaDiv"
						class="wrap-input100 m-b-20 {{$errors->has("nmSenhaUsuario") ? "alert-validate" : ""}}"
						data-validate="{{ $errors->has("nmSenhaUsuario") ? $errors->first("nmSenhaUsuario") : "" }}">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="nmSenhaUsuario" id="nmSenhaUsuario"
							placeholder="Nova Senha" value="{{Session::get('usuario')->nmSenhaUsuario}}">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-sm">
					<div class="wrap-input100 m-b-20 {{$errors->has("nmSenhaUsuarioC") ? "alert-validate" : ""}}"
						data-validate="{{ $errors->has("nmSenhaUsuarioC") ? $errors->first("nmSenhaUsuarioC") : "" }}">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="nmSenhaUsuarioC" id="nmSenhaUsuarioC"
							placeholder="Confirmar Nova Senha" value="{{Session::get('usuario')->nmSenhaUsuario}}">
						<span class="focus-input100"></span>
					</div>
				</div>
			</div>

			<div class="container-login100-form-btn">
				<button type="button" class="login100-form-btn" onclick="valida()">
					Salvar alterações
				</button>
			</div>

			<input type="hidden" name="idUsuario" id="idUsuario"
				value="@if (Session::has('usuario')){{Session::get('usuario')->id}}@endif">

		</form>
	</div>
</div>



@endsection

@section('importacoes')
<script src="{{ asset('js/usuario/alterar.js') }}"></script>
@endsection