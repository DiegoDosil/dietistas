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
  @if ( session('mensaxe')  === "Debe seleccionar un novo estado para a dieta")
    <script>alertify.error("{{ session('mensaxe') }}");</script>  
  @else
  <script>alertify.success("{{ session('mensaxe') }}");</script>
  @endif
@endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Cambiar estado dietas</h6>
    </div>
      <div class="card-body">
<div class="form-wrapper">
  <form method="POST">
    @csrf
    <select class="js-example-basic-single" name="id">
      @if (count($dietas) > 0)
        @foreach ($dietas as $dieta)
          @if($dieta->dietista_id === $_SESSION['id'])
            <option class="{{ $dieta->finalizada }}" value="{{ $dieta->id }}">{{ $dieta->nome }} , 
              @if ($dieta->finalizada === 0)
                 <span style="color:red !important;"> Incompleta</span>
              @else
                 <span style="color:yellow !important;"> Completa</span>
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
        <input type="radio" id="Incompleta" name="estado" class="custom-control-input" value="Incompleta">
        <label class="custom-control-label" for="Incompleta">Incompleta</label>
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