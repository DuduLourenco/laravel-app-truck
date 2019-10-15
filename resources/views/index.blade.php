<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Login V7</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link href="{!! asset('tse/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
<!--===============================================================================================-->
	<link href="{!! asset('tse/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}" rel="stylesheet">
<!--===============================================================================================-->	
	<link href="{!! asset('tse/css/util.css') !!}" rel="stylesheet">
	<link href="{!! asset('tse/css/main.css') !!}" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form class="login100-form validate-form">
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
							Entrar com E-mail
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Entre com o E-mail: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Entre com a Senha">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>
					
					<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Não possui uma conta?
						</span>

						<a href="#" class="txt3 bo1 hov1">
							Cadastre-se
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>