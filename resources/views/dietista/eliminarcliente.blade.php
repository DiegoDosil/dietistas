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
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Eliminar clientes</h6>
    </div>
      <div class="card-body">
<div class="form-wrapper">
  <form method="POST">
    @csrf
    <select class="js-example-basic-single" name="id">
      @if (count($usuarios) > 0)
        @foreach ($usuarios as $usuario)
          @if ($usuario->dependencia === $_SESSION['id'])
            <option value="{{ $usuario->id }}">{{ $usuario->nome }} 
            </option>
          @endif
        @endforeach
      @endif
    </select>
    <br><br>
    <button type="submit" class="btn btn-primary">Eliminar</button>
  </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
      </div>
  </div>
@endsection