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
  <script>alertify.success("{{ session('mensaxe') }}");</script>
@endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Eliminar citas</h6>
    </div>
      <div class="card-body">
<div class="form-wrapper">
  <form method="POST">
    @csrf
    <select class="js-example-basic-single" name="id">
      @if (count($citas) > 0)
        @foreach ($citas as $cita)
          @if($cita->dietista_id === $_SESSION['id'])
            <option class="{{ $cita->estado }}" value="{{ $cita->id }}">{{ $cita->fecha }} , {{ $cita->hora }} , 
              @foreach($usuarios as $usuario) 
                @if($usuario->id === $cita->idcliente)
                  {{ $usuario->nome }} , 
                @endif
              @endforeach
              @if ($cita->estado === "Pendente")
                 <span style="color:red !important;"> Pendente</span>
              @endif
              @if ($cita->estado === "Realizada")
                 <span style="color:yellow !important;"> Realizada</span>
              @endif
              @if ($cita->estado === "Completa")
                 <span style="color:green !important;"> Completa</span>
              @endif
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