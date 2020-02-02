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
      <h6 class="m-0 font-weight-bold text-primary">Listado de clientes</h6>
    </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Activado</th>
              </tr>
            </thead>
            <tbody>
            @if (count($usuarios) > 0)
                @foreach ($usuarios as $usuario)
                    @if($usuario->dependencia === $_SESSION['id'])
                    <tr>
                      <td>{{ $usuario->id }}</td>
                      <td>{{ $usuario->nome }}</td>
                      <td>{{ $usuario->email }}</td>
                      <td>{{ $usuario->direccion }}</td>
                      <td>{{ $usuario->telefono }}</td>
                      <td>{{ $usuario->activado }}</td>
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