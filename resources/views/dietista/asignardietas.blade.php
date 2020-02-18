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
  @if ( session('mensaxe') === "Dieta asignada correctamente")
    <script>alertify.success("{{ session('mensaxe') }}");</script>
  @else
   <script>alertify.error("{{ session('mensaxe') }}");</script>
  @endif
@endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Asignar dieta</h6>
    </div>
      <div class="card-body">
        <div class="form-wrapper">
          <form method="POST">
          @csrf
            <div class="form-group">
              <!--cliente-->
              <label for="idcliente">Cliente</label>
              <select id="idcliente" class="js-example-basic-single" name="idcliente">
                  @if (count($usuarios) > 0)
                    @foreach ($usuarios as $usuario)
                        @if ($usuario->dependencia === $_SESSION['id'])
                          <option value="{{ $usuario->id }}">{{ $usuario->nome }} </option>
                        @endif
                    @endforeach
                  @endif
              </select>
            </div>
            <br>
            <span id="seleccionar_cliente" class="btn btn-primary">Seleccionar cliente</span>
            <!--fin cliente-->
            <!--alteracións dos clientes-->
            <br>
            @foreach($usuarios as $usuario)
              <div id="usu{{ $usuario->id }}"  class="oculto" style="display: none;">
                <br>
                <h6 class="m-0 font-weight-bold text-primary">Alteracións alimenticias do cliente:</h6>
                <br>
                @foreach($usualteracions as $usualteracion)
                  @if($usualteracion->usuario_id === $usuario->id)
                    @foreach($alteracions as $alteracion)
                      @if($alteracion->id === $usualteracion->alteracion_id)
                        <p>{{ $alteracion->nome}}</p>
                      @endif
                    @endforeach
                  @endif
                @endforeach
              </div>
            @endforeach
            <br>
            <!--fin alteracións dos clientes-->
            <!--dietas, só se poden asignar dietas completadas-->
            @foreach($usuarios as $usuario)
            <div class="form-group">
            <div id="usus{{ $usuario->id }}" class="form-group oculto" style="display: none;">
              <select class="js-example-basic-single" id="id_dieta" name="id_dieta">
                @foreach ($dietas as $dieta)
                  @if($dieta->dietista_id === $_SESSION['id'])
                      @if($dieta->finalizada === 1)
                        <option value="{{ $dieta->id }}">{{ $dieta->nome }} @if($dieta->observacions!=null) - {{ $dieta->observacions }} @endif</option>
                      @endif
                  @endif
                @endforeach
              </select>
            <input id="dietista_id" type="hidden" name="dietista_id" value="{{ $_SESSION['id'] }}">
            <br><br>
            <button type="submit" class="btn btn-primary">Asignar</button>
          </div>
          </div>
          @endforeach
            <!--fin dietas-->
          </form>    
        </div>
      </div>
  </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $("#seleccionar_cliente").click(function(){
          var id_cliente=$("#idcliente").val();
          if(idcliente!="")
            {
            $('.oculto').hide();
            $('.ocultos').hide();
            var idusu='#usu'+$("#idcliente").val();
            var idusus='#usus'+$("#idcliente").val();
            $(idusu).show();
            $(idusus).show();
            }
            else{alertify.error("Debe seleccionar algún cliente");}
        });

    });
</script>        

@endsection