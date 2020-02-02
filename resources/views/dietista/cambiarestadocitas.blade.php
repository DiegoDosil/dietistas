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
  @if ( session('mensaxe')  === "Debe seleccionar un novo estado para a cita")
    <script>alertify.error("{{ session('mensaxe') }}");</script>  
  @else
  <script>alertify.success("{{ session('mensaxe') }}");</script>
  @endif
@endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Cambiar estado citas</h6>
    </div>
{{-- @component('components.c_filtrado_citas')
@endcomponent--}}
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
    <h6 class="m-0 text-primary">Cambiar por:</h6>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Completa" name="estado" class="custom-control-input" value="Completa">
        <label class="custom-control-label" for="Completa">Completa</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Realizada" name="estado" class="custom-control-input" value="Realizada">
        <label class="custom-control-label" for="Realizada">Realizada</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="Pendente" name="estado" class="custom-control-input" value="Pendente">
        <label class="custom-control-label" for="Pendente">Pendente</label>
    </div>
    <button type="submit" class="btn btn-primary">Cambiar estado</button>
  </form>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

@endsection