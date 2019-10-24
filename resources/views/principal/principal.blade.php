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
      @if (Session::has('usuario'))
        @if (Carbon\Carbon::now()->format('H') >= 18 || Carbon\Carbon::now()->format('H') <= 4) <span
          class="login100-form-title p-b-40">
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


@endsection

@section('importacoes')
<script src="{{ asset('api/api.js') }}"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQCnq0A9TueU4DKWoAtSONIXX-6kFLxys&libraries=places,directions&callback=initMap"
  async defer></script>
@endsection