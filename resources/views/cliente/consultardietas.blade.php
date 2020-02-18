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
@if ( session('mensaxe') )
  <script>alertify.error("{{ session('mensaxe') }}");</script>
@endif
@if ( count($dietas) > 0 )
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Consulta de dietas</h6>
    </div>
      <div class="card-body">
	   <div class="form-wrapper">

        <select class="js-example-basic-single" id="id_dieta" name="id_dieta">
       	@foreach ($usudietas as $usudieta)
       		@if($usudieta->cliente_id === $_SESSION['id'])
           <option value="{{ $usudieta->dieta_id }}">
            @foreach($dietas as $dieta)
              @if($dieta->id === $usudieta->dieta_id)
              {{ $dieta->nome }} @if($dieta->observacions!=null) - {{ $dieta->observacions }} @endif
              @endif
            @endforeach
            </option>
          @endif
        @endforeach
        </select>
		<br><br>
		<span id="seleccionar_dieta" class="btn btn-primary">Seleccionar</span>
		@foreach($dietas as $dieta)
		@if($dieta->dietista_id === $_SESSION['dependencia'])
		<div class="divoculto" id="control{{ $dieta->id }}" style="display: none;">
		<br><br>
			<h6 class="m-0 font-weight-bold text-primary">Alimentos que compoñen a dieta {{ $dieta->nome}}</h6>
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		            <thead>
        		      <tr>
                		<th>Nome</th>
		                <th>Cantidade</th>
		              </tr>
        		    </thead>
            		<tbody>
            		@if (count($alimentos) > 0)
					       @foreach ($alimentos as $alimento)
	                    @if($alimento->dieta_id === $dieta->id)
                    		<tr>
                      			<td>{{ $alimento->descripcion }}</td>
                      			<td>{{ $alimento->cantidade }}</td>
                    		</tr>
                    	@endif
                	@endforeach
            		@endif
            		</tbody>
				</table>
			</div>
		<br><br>
			<h6 class="m-0 font-weight-bold text-primary">Valores nutricionais da dieta {{ $dieta->nome}}</h6>
			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		            <thead>
        		      <tr>
                		<th>Nutrinte</th>
		                <th>Valor</th>
		              </tr>
        		    </thead>
            		<tbody>
                   		<tr>
                    		<td>Enerxía (kj)</td>
                      		<td>{{ $dieta->enerxia }}</td>
                    	</tr>
                   		<tr>
                    		<td>Auga (gramos) </td>
                      		<td>{{ $dieta->auga }}</td>
                    	</tr>
                   		<tr>
                    		<td>Carbohidratos (gramos) </td>
                      		<td>{{ $dieta->carbohidratos }}</td>
                    	</tr>
                   		<tr>
                    		<td>Fibra (gramos) </td>
                      		<td>{{ $dieta->fibra }}</td>
                    	</tr>
                   		<tr>
                    		<td>Proteína (gramos) </td>
                      		<td>{{ $dieta->proteina }}</td>
                    	</tr>
                   		<tr>
                    		<td>Ácidos grasos monoinsaturados (gramos) </td>
                      		<td>{{ $dieta->monoinsat }}</td>
                    	</tr>
                   		<tr>
                    		<td>Ácidos grasos poliinsaturados (gramos) </td>
                      		<td>{{ $dieta->poliinsat }}</td>
                    	</tr>
                   		<tr>
                    		<td>Ácidos grasos saturados (gramos) </td>
                      		<td>{{ $dieta->acidosgsaturados }}</td>
                    	</tr>
                   		<tr>
                    		<td>Colesterol (miligramos) </td>
                      		<td>{{ $dieta->colesterol }}</td>
                    	</tr>
                   		<tr>
                    		<td>Calcio (miligramos) </td>
                      		<td>{{ $dieta->calcio }}</td>
                    	</tr>
                   		<tr>
                    		<td>Ferro (miligramos) </td>
                      		<td>{{ $dieta->ferro }}</td>
                    	</tr>
                   		<tr>
                    		<td>Potasio (miligramos) </td>
                      		<td>{{ $dieta->potasio }}</td>
                    	</tr>
                   		<tr>
                    		<td>Magnesio (miligramos) </td>
                      		<td>{{ $dieta->magnesio }}</td>
                    	</tr>
                   		<tr>
                    		<td>Sodio (miligramos) </td>
                      		<td>{{ $dieta->sodio }}</td>
                    	</tr>
                   		<tr>
                    		<td>Fósforo (miligramos) </td>
                      		<td>{{ $dieta->fosforo }}</td>
                    	</tr>
            		</tbody>
				</table>
			</div>

		</div>
		@endif
		@endforeach















       </div>
      </div>
  </div>

@else
   <script>alertify.error("Non hai dietas que amosar");</script>
@endif
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
                $("#seleccionar_dieta").click(function(){
          $(".divoculto").hide();
          var id_dieta='#control'+($("#id_dieta").val());
          if(id_dieta!='#control')
            {
            $(id_dieta).show();
            }
            else{alertify.error("Debe seleccionar algunha dieta");}
        });

    });
</script>        
@endsection