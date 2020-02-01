@extends('layoutdietista.main')

@section('content')

@php
if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$ok=false;
if (isset($_SESSION['dependencia'])) {
   if($_SESSION['dependencia']=="1"){$ok=true;}
      }
if(!$ok){return view('ingresoincorrecto');}
@endphp
@if ( session('mensaxe') )
   <script>alertify.success("{{ session('mensaxe') }}");</script>
@endif

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Crear cliente</h6>
    </div>
      <div class="card-body">
@component('components.c_form_rexistro')
    @slot('dependencia', $_SESSION['id'])
@endcomponent
      </div>
  </div>
@endsection