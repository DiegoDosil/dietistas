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
  <div class="card shadow mb-4">
   <div class="card-body">
<div class="form-wrapper">
    <br><br>
    <p><button id="seleccionarGrafico" class="btn btn-primary">Amosar gráfico de evolución</button><span>   </span><button id="seleccionarTaboa" class="btn btn-primary">Amosar táboa de evolución</button></p>
    <br><br>
<div id="graficos" class="non" style="display: none;">
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Peso</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="graficopeso"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">IMC</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="graficoimc"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Porcentaxe de graxa</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcgrasa"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Porcentaxe de auga</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcauga"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Porcentaxe de masa muscular</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcmasamusc"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Medida perna</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcmedperna"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Medida cadeira</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcmedcadera"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Medida cintura</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcmedcintura"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Medida peito</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="pcmedpeito"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--FIN GRAFICOS OCULTOS-->
<div id="taboa" class="non" style="display: none;">
  <div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Data</th>
          <th>Peso</th>
          <th>IMC</th>
          <th>%Graxa</th>
          <th>%Auga</th>
          <th>%Masa muscular</th>
          <th>Perna</th>
          <th>Cadeira</th>
          <th>Cintura</th>
          <th>Peito</th>
        </tr>
      </thead>
      <tbody id="corpotaboa">
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<div id="spanscontrol"></div>
</div>




<script type="text/javascript">
    $(document).ready(function() {
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
function engadirDatos(chart, etiqueta, dato) {
    chart.data.labels.push(etiqueta);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(dato);
    });
}
        $("#seleccionarGrafico").click(function(){
            var numerocitas=0;
            @foreach($citas as $cita)
              @if ($cita->estado === "Completa" && $cita->idcliente === $_SESSION['id'])
               numerocitas++;
              @endif
            @endforeach
            if(numerocitas<2){alertify.error("Debe ter alomenos 2 citas completas para ver a súa evolución");$("#graficos").fadeOut(500);}
            else
              {
              if($("#graficos").hasClass("non"))
                {
              @foreach($citas as $cita)
                @if ($cita->estado === "Completa" && $cita->idcliente === $_SESSION['id'])
                    engadirDatos(chartPeso,"{{ $cita->fecha }}",{{ $cita->peso }});
                    engadirDatos(chartImc,"{{ $cita->fecha }}",{{ $cita->imc }});
                    engadirDatos(chartpcgrasa,"{{ $cita->fecha }}",{{ $cita->pcgrasa }});
                    engadirDatos(chartpcauga,"{{ $cita->fecha }}",{{ $cita->pcauga }});
                    engadirDatos(chartpcmasamusc,"{{ $cita->fecha }}",{{ $cita->pcmasamusc }});
                    engadirDatos(chartpcmedperna,"{{ $cita->fecha }}",{{ $cita->pcmedperna }});
                    engadirDatos(chartpcmedcadera,"{{ $cita->fecha }}",{{ $cita->pcmedcadera }});
                    engadirDatos(chartpcmedcintura,"{{ $cita->fecha }}",{{ $cita->pcmedcintura }});
                    engadirDatos(chartpcmedpeito,"{{ $cita->fecha }}",{{ $cita->pcmedpeito }});
                @endif
            @endforeach
            chartPeso.update();
            chartImc.update();
            chartpcgrasa.update();
            chartpcauga.update();
            chartpcmasamusc.update();
            chartpcmedperna.update();
            chartpcmedcadera.update();
            chartpcmedcintura.update();
            chartpcmedpeito.update();
            $("#graficos").removeClass("non").addClass("si"); 
            }
           $("#taboa").hide();
           $("#graficos").fadeIn(500);
              }
        });
        $("#seleccionarTaboa").click(function(){
            var numerocitas=0;
            @foreach($citas as $cita)
              @if ($cita->estado === "Completa" && $cita->idcliente === $_SESSION['id'])
                numerocitas++;
              @endif
            @endforeach
            if(numerocitas<2){alertify.error("Debe ter alomenos 2 citas completas para ver a súa evolución");$("#graficos").fadeOut(500);}
            else
              {
              if($("#taboa").hasClass("non"))
                {
                @foreach($citas as $cita)
                  @if ($cita->estado === "Completa" && $cita->idcliente === $_SESSION['id'])
                    $("#corpotaboa").append("<tr id='{{ $cita->id }}'>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->fecha }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->peso }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->imc }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcgrasa }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcauga }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcmasamusc }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcmedperna }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcmedcadera }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcmedcintura }}</td>");
                    $("#{{ $cita->id }}").append("<td>{{ $cita->pcmedpeito }}</td>");
                  @endif
                @endforeach
              $("#taboa").removeClass("non").addClass("si");
              }
              $("#graficos").hide();
              $("#taboa").fadeIn(500);
              }
            
        });
    });

var elementoPeso = document.getElementById("graficopeso");
var chartPeso = new Chart(elementoPeso, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Peso",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value+' kg';}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + " kg";
        }
      }
    }
  }
});
var elementoImc = document.getElementById("graficoimc");
var chartImc = new Chart(elementoImc, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "IMC",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel;
        }
      }
    }
  }
});
var elementoPcgrasa = document.getElementById("pcgrasa");
var chartpcgrasa = new Chart(elementoPcgrasa, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Graxa",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value+' %';}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + "%";
        }
      }
    }
  }
});
var elementopcauga = document.getElementById("pcauga");
var chartpcauga = new Chart(elementopcauga, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Auga",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + "%";
        }
      }
    }
  }
});
var elementopcmasamusc = document.getElementById("pcmasamusc");
var chartpcmasamusc = new Chart(elementopcmasamusc, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Masa muscular",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + "%";
        }
      }
    }
  }
});
var elementopcmedperna = document.getElementById("pcmedperna");
var chartpcmedperna = new Chart(elementopcmedperna, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Medida perna",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + " cms";
        }
      }
    }
  }
});
var elementopcmedcadera = document.getElementById("pcmedcadera");
var chartpcmedcadera = new Chart(elementopcmedcadera, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Medida cadeira",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + " cms";
        }
      }
    }
  }
});
var elementopcmedcintura = document.getElementById("pcmedcintura");
var chartpcmedcintura = new Chart(elementopcmedcintura, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Medida perna",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + " cms";
        }
      }
    }
  }
});
var elementopcmedpeito = document.getElementById("pcmedpeito");
var chartpcmedpeito = new Chart(elementopcmedpeito, {
  type: 'line',
  data: {
    labels: [],
    datasets: [{
      label: "Medida perna",
      lineTension: 0.3,backgroundColor: "rgba(78, 115, 223, 0.05)",borderColor: "rgba(78, 115, 223, 1)",pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",pointBorderColor: "rgba(78, 115, 223, 1)",pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",pointHoverBorderColor: "rgba(78, 115, 223, 1)",pointHitRadius: 10,pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {maintainAspectRatio: false,layout: {padding: {left: 10,right: 25,top: 25,bottom: 0}
    },
    scales: {
      xAxes: [{time: {unit: 'date'},gridLines: {display: false,drawBorder: false},ticks: {maxTicksLimit: 7}}],
      yAxes: [{ticks: {maxTicksLimit: 5,padding: 10,callback: function(value, index, values) 
        {return value;}},
        gridLines: {color: "rgb(234, 236, 244)",zeroLineColor: "rgb(234, 236, 244)",drawBorder: false,borderDash: [2],zeroLineBorderDash: [2]}
      }],
    },
    legend: {display: false},
    tooltips: {
      backgroundColor: "rgb(255,255,255)",bodyFontColor: "#858796",titleMarginBottom: 10,titleFontColor: '#6e707e',titleFontSize: 14,
      borderColor: '#dddfeb',borderWidth: 1,xPadding: 15,yPadding: 15,displayColors: false,intersect: false,mode: 'index',caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " "+tooltipItem.yLabel + " cms";
        }
      }
    }
  }
});
















</script>

@endsection