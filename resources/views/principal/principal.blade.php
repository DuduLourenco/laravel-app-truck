@extends('layouts.app')

@section('titulo')
Viajar
@endsection

@section('css')
<!-- <link href="{{ asset('api/api.css') }}" rel="stylesheet"> -->
@endsection


@if(!Session::get('logado'))
<script>
  window.location = '{{url('usuarios/login')}}';
</script>
@endif


@section('conteudo')

@extends('layouts.menu')


<div class="container-login100" style="align-items: stretch">  
  <div class="wrap-login100 p-t-45 p-b-30" style="width: 640px">

    @if (Carbon\Carbon::now()->format('H') >= 18 || Carbon\Carbon::now()->format('H') <= 4) 
    <span class="login100-form-title p-b-40">
      Boa noite, {{Session::get('usuario')->nmUsuario}}
    </span>
    @elseif (Carbon\Carbon::now()->format('H') >= 12)    
    <span class="login100-form-title p-b-40">
      Boa tarde, {{Session::get('usuario')->nmUsuario}}
    </span>
    @else
    <span class="login100-form-title p-b-40">
      Bom dia, {{Session::get('usuario')->nmUsuario}}
    </span>
    @endif
    
    <div class="wrap-input100 m-b-16 m-t-16">
      <div id="map" class="input100 mx-auto" style="min-height: 340px;">



      </div>
    </div>

    <div class="wrap-input100 m-b-16 m-t-16">
      <input class="input100" type="text" style="text-align: center" id="pac-input" placeholder="Insira sua Jornada">
      <span class="focus-input100"></span>
    </div>



  </div>
</div>



<!--
<div id="top"></div>

<div class="bg-dark backg"></div>
<div class="p-3 stuff">
  <h2 class="mx-auto text-light "></h2>
  <div id="map" class="rounded-lg shadow"></div>
  <div class="wrap-input100 validate-input m-b-16 m-t-16" data-validate="Insira a jornada">
    <input class="input100" type="text" maxlength="14" name="cdCpfUsuario" id="cdCpfUsuario" placeholder="Insira sua Jornada">
    <span class="focus-input100"></span>
  </div>
  <a href="#proxViag "><i class="d-block text-light text-center font-weight-bolder material-icons md-48">
      keyboard_arrow_up
    </i></a>
</div>
<div id="proxViag" class="bg-dark">
  <br>
  <br>
  <a href="#top"><i class="d-block text-light text-center font-weight-bolder material-icons md-48">
      keyboard_arrow_down
    </i></a>
  <div class="card mx-auto" style="width: 19rem;">
    <div class="card-body">
      <h5 class="card-title text-center mb-4">Data:__/__/__</h5>
      <h6 class="card-subtitle m-4 text-muted">Veículo: <span class="alert alert-dark w-50" role="alert">
          AAA ####
        </span></h6>
      <div class="btn-group w-100" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">Exluir</button>
        <button type="button" class="btn btn-secondary">Alterar</button>
        <button type="button" class="btn btn-secondary">Feito</button>
      </div>
    </div>
  </div>
  <div class="card mx-auto mt-3" style="width: 19rem;">
    <div class="card-body">
      <h5 class="card-title text-center mb-4">Data:__/__/__</h5>
      <h6 class="card-subtitle m-4 text-muted">Veículo: <span class="alert alert-dark w-50" role="alert">
          AAA ####
        </span></h6>
      <div class="btn-group w-100" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">Exluir</button>
        <button type="button" class="btn btn-secondary">Alterar</button>
        <button type="button" class="btn btn-secondary">Feito</button>
      </div>
    </div>
  </div>

</div>

-->


@endsection

@section('importacoes')
<script src="{{ asset('api/api.js') }}"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQCnq0A9TueU4DKWoAtSONIXX-6kFLxys&libraries=places,directions&callback=initMap"
  async defer></script>
@endsection