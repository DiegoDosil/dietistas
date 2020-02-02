    <div class="card-header py-3">
      <h6 class="m-0 text-primary">Amosar:</h6>
      <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="checktodos" checked="true">
      <label class="custom-control-label" for="checktodos">Todas</label>
    </div>
      <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="checkpendentes">
      <label class="custom-control-label" for="checkpendentes">Pendentes</label>
    </div>
      <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="checkrealizadas">
      <label class="custom-control-label" for="checkrealizadas">Realizadas</label>
    </div>
      <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="checkcompletas">
      <label class="custom-control-label" for="checkcompletas">Completas</label>
    </div>
    </div>
      <script type="text/javascript">
        $(document).ready(function() {
         $("#checktodos").change(function() {
          if(($("#checktodos").is(':checked')))
            {
            $("#checkpendentes").prop('checked', false);
            $("#checkrealizadas").prop('checked', false);
            $("#checkcompletas").prop('checked', false);
            }
          else
            {
            $("#checkpendentes").prop('checked', true);
            $("#checkrealizadas").prop('checked', true);
            $("#checkcompletas").prop('checked', true);
            }
          $(".Pendente").show();
          $(".Realizada").show();
          $(".Completa").show();
        });
         $("#checkpendentes").change(function() {
          if($('#checktodos').is(':checked')){$("#checktodos").prop('checked', false);}
          cambiaVista();
        });

         $("#checkrealizadas").change(function() {
          if($('#checktodos').is(':checked')){$("#checktodos").prop('checked', false);}
          cambiaVista();
        });
         $("#checkcompletas").change(function() {
          if($('#checktodos').is(':checked')){$("#checktodos").prop('checked', false);}
          cambiaVista();
        });
        function cambiaVista(){
          if($("#checkrealizadas").is(':checked')){$(".Realizada").show();}
          else{$(".Realizada").hide();}
          if($("#checkcompletas").is(':checked')){$(".Completa").show();}
          else{$(".Completa").hide();}
          if($("#checkpendentes").is(':checked')){$(".Pendente").show();}
          else{$(".Pendente").hide();}
        }
    });

  </script>