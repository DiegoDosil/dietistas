@extends('layoutcliente.main')

@section('content')
@php
if(session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$ok=false;
if (isset($_SESSION['dependencia'])) {
   if($_SESSION['dependencia']!="0" && $_SESSION['dependencia']!="1" && $_SESSION['activado']!="0"){$ok=true;}
      }
if(!$ok){return view('ingresoincorrecto');}
@endphp
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Citas pendentes</h6>
    </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Día</th>
                <th>Hora</th>
              </tr>
            </thead>
            <tbody>
            @if (count($citas) > 0)
                @foreach ($citas as $cita)
                    @if($cita->idcliente === $_SESSION['id'] && $cita->estado === "Pendente")
                    <tr>
                      <td>{{ $cita->fecha }}</td>
                      <td>{{ $cita->hora }}</td>
                    </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
          </table>
        </div>
      </div>
  </div>
@endsection