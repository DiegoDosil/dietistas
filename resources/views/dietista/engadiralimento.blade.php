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
  @if ( session('mensaxe') === "Alimento engadido correctamente")
    <script>alertify.success("{{ session('mensaxe') }}");</script>
  @else
   <script>alertify.error("{{ session('mensaxe') }}");</script>
  @endif
@endif
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Engadir alimento a dieta</h6>
    </div>
      <div class="card-body">
        <div class="form-wrapper">
          <p>
          <form method="POST">
          @csrf
                <select class="js-example-basic-single" id="id_dieta" name="id_dieta">
                  @if (count($dietas) > 0)
                    @foreach ($dietas as $dieta)
                      @if($dieta->dietista_id === $_SESSION['id'])
                        @if($dieta->finalizada === 0)
                        <option value="{{ $dieta->id }}">{{ $dieta->nome }}     {{ $dieta->observacions }}</option>
                        @endif
                      @endif
                    @endforeach
                  @endif
                </select>
                <br><br>
            <br>
            <span id="seleccionar_dieta" class="btn btn-primary">Seleccionar</span>
            <div id="divalimentos" style="display: none;">
            <br><br>
            <div class="form-group">
              <label for="alimento01">Alimento</label>
              <select id="alimento01" class="js-example-basic-single" name="alimento01">
              		@php
              			for ($i=0; $i < count($alimentos); $i++) { 
              				echo"<option value='".$alimentos[$i]."'>";
              				$i++;
              				echo $alimentos[$i]."</option>";
              			}
              		@endphp
              </select>
            </div>
            <div class="form-group">
              <label for="cantidade">Cantidade:</label>
              <input type="number" name="cantidade" id="cantidade" value="1" min="1">
            </div>
            <br>
            <input id="dietista_id" type="hidden" name="dietista_id" value="{{ $_SESSION['id'] }}">
            <button type="submit" class="btn btn-primary">Engadir alimento</button>
            </div>
          </form>
        </div>
      </div>
  </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
                $("#seleccionar_dieta").click(function(){
          var id_dieta=$("#id_dieta").val();
          if(id_dieta!="" && id_dieta!=null)
            {
            $("#divalimentos").show();
            }
            else{alertify.error("Debe seleccionar algunha dieta");}
        });

    });
</script>        
@endsection