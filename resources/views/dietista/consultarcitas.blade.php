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
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Listado de citas</h6>
    </div>
@component('components.c_filtrado_citas')
@endcomponent
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Estado</th>
                <th>Nome</th>
                <th>Día</th>
                <th>Hora</th>
                <th>Dirección</th>
                <th>Observacións</th>
              </tr>
            </thead>
            <tbody>
            @if (count($citas) > 0)
                @foreach ($citas as $cita)
                    @if($cita->dietista_id === $_SESSION['id'])
                    <tr class="{{ $cita->estado }}">
                      <td>{{ $cita->estado }}</td>
                      <td>
                        @foreach ($usuarios as $usuario)
                           @if($cita->idcliente === $usuario->id)
                               {{ $usuario->nome }}
                           @endif
                        @endforeach
                      </td>
                      <td>{{ $cita->fecha }}</td>
                      <td>{{ $cita->hora }}</td>
                      <td>{{ $cita->localizacion }}</td>
                      <td>{{ $cita->observacions }}</td>
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