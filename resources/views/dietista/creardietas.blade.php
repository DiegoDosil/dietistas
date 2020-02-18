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
  @if ( session('mensaxe') === "O nome da dieta xa existe")
    <script>alertify.error("{{ session('mensaxe') }}");</script>
  @else
   <script>alertify.success("{{ session('mensaxe') }}");</script>
  @endif
@endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Crear dieta</h6>
    </div>
      <div class="card-body">
        <div class="form-wrapper">
          <form method="POST">
          @csrf
            <div class="form-group">
                <label for="nomedieta">Nome da dieta</label>
                <input type="text" class="form-control" name="nomedieta" id="nomedieta" aria-describedby="nomeDietaHelp" required>
                <small id="nomeDietaHelp" class="form-text text-muted">Introduza aquí como desexa titular a dieta.</small>
            </div>
            <div class="form-group">
                <label for="observacions">Observacións</label>
                <input type="text" class="form-control" name="observacions" id="observacions" aria-describedby="observaHelp">
                <small id="observaHelp" class="form-text text-muted">Introduza as observacións que desexe acerca da dieta que vai crear (opcional).</small>
            </div>
            <input id="dietista_id" type="hidden" name="dietista_id" value="{{ $_SESSION['id'] }}">
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>    
        </div>
      </div>
  </div>
@endsection