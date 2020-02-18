@extends('layoutadmin.main')

@section('content')

@php
if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$ok=false;
if (isset($_SESSION['dependencia'])) {
   if($_SESSION['dependencia']=="0"){$ok=true;}
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
      <h6 class="m-0 font-weight-bold text-primary">Crear dietista</h6>
    </div>
      <div class="card-body">
@component('components.c_form_rexistro')
    @slot('dependencia', '1')
@endcomponent
      </div>
  </div>
@endsection