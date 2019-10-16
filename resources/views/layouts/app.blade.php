<!DOCTYPE html>
<html lang="pt">
<head>	
	<meta charset="UTF-8">
	<title>App Trucks - @yield('titulo')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>


	@yield('conteudo')


<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.4.1.min.js"></script>
	<script src="../vendor/jquery/jquery.mask.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.js"></script>
	<script src="../vendor/bootbox/bootbox.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	<script src="../js/util.js"></script>
	
	@if (Session::has('message'))
	<input type="hidden" id="message" value="{{ Session::get('message') }}">
   <script>
	    mensagem = $('#message').val();
   		bootbox.alert({
            message: mensagem,
            backdrop: true,
            size: 'small'
        });
   </script>
	@endif

	@yield('importacoes')

</body>
</html>