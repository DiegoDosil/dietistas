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
      <h6 class="m-0 font-weight-bold text-primary">Crear cita</h6>
    </div>
      <div class="card-body">
        <div class="form-wrapper">
          <form method="POST">
          @csrf
                  @if (count($usuarios) > 0)
                    @foreach ($usuarios as $usuario)
                        @if ($usuario->dependencia === $_SESSION['id'])
                          <span id="aux{{ $usuario->id }}" class="{{ $usuario->direccion}}"></span>
                        @endif
                    @endforeach
                  @endif
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
            <!--fin cliente-->
            <!--inicio data e hora-->
            <div class="form-group">
              <label for="fecha">Data</label>
              <div class="input-group date" id="fecha" data-target-input="nearest">
                    <input type="text" name="fecha" class="form-control datetimepicker-input" aria-describedby="fechahelp" data-target="#fecha"/>
                    <div class="input-group-append" data-target="#fecha" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
              </div>
              <small id="fechahelp" class="form-text text-muted">Data da cita. Recoméndase usar o picker para non introducir formatos incorrectos</small>
            </div>
            <div class="form-group">
              <label for="hora">Hora</label>
              <div class="input-group date" id="hora" data-target-input="nearest">
                    <input type="text" name="hora" class="form-control datetimepicker-input" aria-describedby="horahelp" data-target="#hora"/>
                    <div class="input-group-append" data-target="#hora" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                    </div>
              </div>
              <small id="horahelp" class="form-text text-muted">Hora da cita. Recoméndase usar o picker para non introducir formatos incorrectos</small>
            </div>
            <!--fin data e hora-->
            <div class="form-group">
                <label for="localizacion">Localización</label>
                <input type="text" class="form-control" name="localizacion" id="localizacion" aria-describedby="localizaHelp" required>
                <small id="localizaHelp" class="form-text text-muted">Lugar onde se efectuará a cita.</small>
            </div>
            <div class="form-group">
                <label for="observacions">Observacións</label>
                <input type="text" class="form-control" name="observacions" id="observacions" aria-describedby="observaHelp" required>
                <small id="observaHelp" class="form-text text-muted">Introduza aquí as observacións que desexe acerca da cita.</small>
            </div>
            <input id="dietista_id" type="hidden" name="dietista_id" value="{{ $_SESSION['id'] }}">
            <input id="estado" type="hidden" name="estado" value="Pendente">
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>    
        </div>
      </div>
  </div>
        <script type="text/javascript">
            $(function () {
                $('#fecha').datetimepicker({
                    locale: 'gl',
                    format: 'L'
                });
            });
            $(function () {
                $('#hora').datetimepicker({
                    format: 'LT'
                });
            });        
        </script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
         $( ".js-example-basic-single.select2-hidden-accessible" ).change(function() {
          var oid="aux";
          oid="#aux"+$("#idcliente").val();
          $('#localizacion').val($(oid).attr("class"));
        });

    });
</script>        

@endsection