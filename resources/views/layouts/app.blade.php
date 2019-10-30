<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->

<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>App Trucks - @yield('titulo')</title>


	@yield('css')
</head>
<body >
	<input type="hidden" id="refreshed" value="no">
	@yield('conteudo')

<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.4.1.js') }}"></script>
	<script src="{{ asset('vendor/jquery/jquery.mask.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('vendor/bootbox/bootbox.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/util.js') }}"></script>

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
