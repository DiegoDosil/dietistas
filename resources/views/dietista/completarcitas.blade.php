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
      <h6 class="m-0 font-weight-bold text-primary">Seleccione a cita que desexa completar:</h6>
    </div>
      <div class="card-body">
<div class="form-wrapper">
    <select class="js-example-basic-single" id="seleccion">
      @if (count($citas) > 0)
        @foreach ($citas as $cita)
          @if($cita->dietista_id === $_SESSION['id'])
            @if($cita->estado === "Realizada")
            <option class="{{ $cita->id }}" value="{{ $cita->id }}">{{ $cita->fecha }} , {{ $cita->hora }} , 
              @foreach($usuarios as $usuario) 
                @if($usuario->id === $cita->idcliente)
                  {{ $usuario->nome }} , 
                @endif
              @endforeach
              @if ($cita->estado === "Realizada")
                 <span style="color:yellow !important;"> Realizada</span>
              @endif
            </option>
            @endif
          @endif
        @endforeach
      @endif
    </select>
    <br><br>
    <button id="seleccionar" class="btn btn-primary">Seleccionar</button>
    <br>
<div id="formulario" style="display: none;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Introduza os datos da cita:</h6>
    </div>
<form method="POST">
    @csrf
  <div class="form-group">
    <label for="observacions">Observacións</label>
    <input type="text" class="form-control" name="observacions" id="observacions" value="">
  </div>
  <div class="form-group">
    <label for="peso">Peso</label>
    <input type="number" class="form-control" id="peso" name="peso" min="5" value="">
  </div>
  <div class="form-group">
    <label for="imc">Índice de Masa Corporal</label>
    <input type="number" class="form-control" id="imc" name="imc" min="20" value="">
  </div>
  <div class="form-group">
    <label for="pcgrasa">Porcentaxe de graxa</label>
    <input type="number" class="form-control" id="pcgrasa" name="pcgrasa" min="10" value="">
  </div>
  <div class="form-group">
    <label for="pcauga">Porcentaxe de auga</label>
    <input type="number" class="form-control" id="pcauga" name="pcauga" min="10" value="">
  </div>
  <div class="form-group">
    <label for="pcmasamusc">Porcentaxe de masa muscular</label>
    <input type="number" class="form-control" id="pcmasamusc" name="pcmasamusc" min="10" value="">
  </div>
  <div class="form-group">
    <label for="pcmedperna">Medida perna</label>
    <input type="number" class="form-control" id="pcmedperna" name="pcmedperna" min="10" value="">
  </div>
  <div class="form-group">
    <label for="pcmedcadera">Medida cadeira</label>
    <input type="number" class="form-control" id="pcmedcadera" name="pcmedcadera" min="10" value="">
  </div>
  <div class="form-group">
    <label for="pcmedcintura">Medida cintura</label>
    <input type="number" class="form-control" id="pcmedcintura" name="pcmedcintura" min="10" value="">
  </div>
  <div class="form-group">
    <label for="pcmedpeito">Medida peito</label>
    <input type="number" class="form-control" id="pcmedpeito" name="pcmedpeito" min="10" value="">
  </div>
  <input id="id" type="hidden" name="id" value="{{ $cita->id}}">
  <button type="submit" class="btn btn-primary">Gardar</button>
</form>    
</div>
</div>
</div>
</div>




<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $("#seleccionar").click(function(){
          var idseleccionado=$("#seleccion").val();
          if(idseleccionado!="")
            {
            @foreach($citas as $cita)
              if(idseleccionado=={{ $cita->id}})
                {
                $("#observacions").val("{{ $cita->observacions }}");
                $("#peso").val({{ $cita->peso }});
                $("#imc").val({{ $cita->imc }});
                $("#pcgrasa").val({{ $cita->pcgrasa }});
                $("#pcauga").val({{ $cita->pcauga }});
                $("#pcmasamusc").val({{ $cita->pcmasamusc }});
                $("#pcmedperna").val({{ $cita->pcmedperna }});
                $("#pcmedcadera").val({{ $cita->pcmedcadera }});
                $("#pcmedcintura").val({{ $cita->pcmedcintura }});
                $("#pcmedpeito").val({{ $cita->pcmedpeito }});
                }
            @endforeach
            $("#formulario").show();
            }
            else{alertify.error("Debe seleccionar algunha cita");}
        });
    });
</script>

@endsection