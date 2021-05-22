@extends('adminlte::page')

@section('title', 'Resoluciones')

@section('content_header')
    <h1>Lista de Resoluciones</h1>
@stop
@section('css')
    <style type="text/css">
    .content-dashboard {
    background: url("../images/fondo.png") no-repeat center center fixed;
    background-size: cover;
    }
    </style>
@stop

@section('content')
{{-- <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-life-ring"></i> Lista de comisiones </h3>
        </div>
    </div> --}}

    <div class="clearfix"></div>
  <br>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="card-header">
          Resoluciones entre periodos<strong></strong>
      </div>

      <div class="card-body card-block">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="input-group input-daterange">
      <div style="width:70px"> Detalle </div>
      <input id="busqueda" name="busqueda" />
      <button type="button" id="btnBuscar" class="btn btn-outline-secondary"><span class="fa fa-search"></span> BUSCAR</button>
    </div>
  </div>
</div>
<br>

          @include('partials.flash-message')

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"></table>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image: url({{ url('images/fondo.jpg') }}) ; background-position: center; ">
  <div class="modal-dialog" role="document"  style="opacity:0.9 !important; top: 15%;">
    <div class="modal-content" >
    <div class="modal-header">
        <div class="col text-center">
            <h4 id="modal_titulo"> <b><u> Detalles de la comision </b></u>  </h4>
        </div>
      </div>

      <div class="modal-body" id = "modal-text" style="font-size:13px; color: black;">
      <div class="row">

      </div>

      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
            <th>Resolucion</th>
            <th>Act/exp</th>
            <th>Detalles</th>
       </tr>
    </thead>
    </table>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnEnviar" name="btnGanador" class="btn btn-outline-secondary"> Aceptar </button>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
  $(document).ready(function() {
    var fecha = new Date();

    $('#fecha_desde').val('01-01-2018');//datepicker({ locale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4', value : '01-' + '01-' + fecha.getFullYear() });
    $('#fecha_hasta').val('01-12-2021');//datepicker({ocale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4',value: dateEs(fecha) });
    cargarTabla();
  });

  $("#btnBuscar").click(function() {
      $('#datatable-responsive').DataTable().destroy();
      cargarTabla();
   });


function cargarTabla (fecha_desde, fecha_hasta){

function format ( d ) {
      return d.agente + d.fecha + d.entidad + d.obra + d.beneficiario + d.localidad + d.monto + d.detalle;
}

      var dt = $('#datatable-responsive').DataTable({
      "responsive" :true,
      "ajax": {
            "url": "{{ url('detalle_resoluciones') }}",
            "type": "GET",
            "data" : {
            "fecha_desde":  $("#fecha_desde").val(),
            "fecha_hasta":  $("#fecha_hasta").val(),
            "busqueda":  $("#busqueda").val(),
            }
        },
      "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningun dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Ultimo",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
      "columns": [

                  {"data":"numero","visible": true, "title" : "Resolucion", "orderable": false},
                  {"data":"act_exp","visible": true, "title" : "Act/exp", "orderable": false},
                  {"data":"tipo_resolucion","visible": true, "title" : "Tipo Res.", "orderable": false},
                  {"data":"agente_entidad","visible": true, "title" : "Agente/Entidad", "orderable": false},
                  {"class":"details-control", "orderable":      false, "data":           'detalle', "render": function ( data, type, full, meta ) {
                        return "<button type='button' class='btn btn-outline-secondary'><span class='fa fa-info'></span> Ver</button>";
                        }, "title" : "Detalle"
                  },

                ],
            "initComplete": function(settings, json) {
              //OBTENGO LOS DATOS OBTENIDOS CON JSON Y LOS GUARDO PARA PODER DIBUJARLOS
                datos =  json.data;
            },
      "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "TODOS"]]

    });

     // Array to track the ids of the details displayed rows
     var detailRows = [];
// MODIFIQUE EL CODIGO ANTERIOR PARA PODER OBTENER EL INDICE Y ASI PODER ASIGNAR EL DATO CORRECTAMENTE
//    $('#datatable-responsive tbody').on( 'click', 'tr td.details-control', function () {
  $('#datatable-responsive tbody').on( 'click', 'tr', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        var indice = $('#datatable-responsive').DataTable().row( this ).index();

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( datos[indice] ) ).show();
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    // On each draw, loop over the `detailRows` array and show any child rows

    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );


  $('#datatable-responsive_filter').hide();
  $('#datatable-responsive select option:contains("it\'s me")').prop('selected',true);

  $('#datatable-responsive thead th').each( function (row, i, start, end, display ) {
    if(row != 4 ){
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar por '+title+'" />' );
    }
  });

  dt.columns().every( function () {
      var that = this;

      $( 'input', this.header() ).on( 'keyup change', function () {
          if ( that.search() !== this.value ) {
              that
                  .search( this.value )
                  .draw();
          }
      } );
    });


}

$('#modal').on('show.bs.modal', function(e) {

    var $modal = $(this);
    var button = $(e.relatedTarget);

    var fecha_desde = $("#fecha_desde").val();
    var fecha_hasta = ($("#fecha_hasta").val());
    var agente_id = button.data('agente_id');

    $('#datatable-responsive').DataTable().destroy();


    cargarDetalle(fecha_desde, fecha_hasta, agente_id);


    $(this).find('.modal-content').css({
              width:'120%', //probably not needed
              height:'auto'
             // ,              'max-height':'100%'
       });


});


function dateEs(inputFormat) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(inputFormat);
  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
}
</script>
@endsection
