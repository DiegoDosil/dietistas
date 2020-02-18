@extends('layoutdietista.main')

@section('content')

@php
if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$ok=false;
if (isset($_SESSION['dependencia'])) {
   if($_SESSION['dependencia']=="1" && $_SESSION['activado']!="0"){$ok=true;}
      }
if(!$ok){return view('ingresoincorrecto');}
@endphp
@if ( session('mensaxe') )
  @if(session('mensaxe') === 'Usuario creado')
   <script>alertify.success("{{ session('mensaxe') }}");</script>
  @else
   <script>alertify.error("{{ session('mensaxe') }}");</script>
  @endif
@endif

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Crear cliente</h6>
    </div>
      <div class="card-body">
        <div class="form-wrapper">
<form method="POST">
    @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="Introduza o nome" value="{{ old('nome') }}" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="{{ old('email') }}" required>
    <small id="emailHelp" class="form-text text-muted">Introduza a dirección de correo electrónico.</small>
  </div>
  <div class="form-group">
    <label for="password">Contrasinal</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Contrasinal" required>
    <small id="passwordHelp" class="form-text text-muted">Introduza o contrasinal (mínimo 8 caracteres).</small>
  </div>
  <div class="form-group">
    <label for="nome">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Introduza a dirección" value="{{ old('direccion') }}" required>
  </div>
  <div class="form-group">
    <label for="nome">Teléfono</label>
    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" pattern="[0-9]{9-12}" required>
  </div>
  <div class="form-group">
    @foreach($alteracions as $alteracion)
    <div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" name="alteracions[]" value="{{ $alteracion->id }}" id="{{ $alteracion->id }}">
       <label class="custom-control-label" for="{{ $alteracion->id }}">{{ $alteracion->nome }}</label>
    </div>
    @endforeach
  </div>
  <input id="dependencia" type="hidden" name="dependencia" value="{{ $_SESSION['id'] }}">
  <input id="activado" type="hidden" name="activado" value="1">
  <button type="submit" class="btn btn-primary">Crear</button>
</form>    
</div>
      </div>
  </div>
@endsection