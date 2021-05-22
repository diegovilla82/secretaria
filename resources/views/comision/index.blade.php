@extends('adminlte::page')

@section('title', 'Comisiones')

@section('content_header')
    <h1>Lista de Comisiones</h1>
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
          Comisiones entre periodos<strong></strong>
      </div>

      <div class="card-body card-block">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-3">
                            {{  Form::date('fecha_desde', \Carbon\Carbon::now()->subYear(2), ['class' => 'form-control', 'id'=> 'fecha_desde' ]) }}
                        </div>
                        <div class="col-md-1"><div class="input-group-addon"> hasta </div></div>
                        <div class="col-md-3 ">

                            {{  Form::date('fecha_hasta', \Carbon\Carbon::now()->addYear(), ['class' => 'form-control', 'id'=> 'fecha_hasta']) }}
                            {{-- <input id="fecha_hasta" width="312" /> --}}
                        </div>
                        <div class="col-md-1"> <button type="button" id="btnBuscar" class="btn btn-outline-secondary"><span class="fa fa-search"></span></button></div>
                    </div>
                    {{-- <input id="fecha_desde" width="312" /> --}}

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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image: url({{ url('assets/images/fondo.jpg') }}) ; background-position: center; ">
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

      <table id="datatable-detalle" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
            <th>Resolucion</th>
            <th>Act/exp</th>
            <th>Detalle</th>
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

    $('#fecha_desde').val();//datepicker({ locale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4', value : '01-' + '01-' + fecha.getFullYear() });
    $('#fecha_hasta').val();//datepicker({ocale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4',value: dateEs(fecha) });
    cargarTabla();
  });

  $("#btnBuscar").click(function() {
      $('#datatable-responsive').DataTable().destroy();
      cargarTabla();
   });

function cargarTabla (){
      var table = $('#datatable-responsive').DataTable({
      "responsive" :true,
      "destroy": true,
/*
      "pageLength": 25,
      "processing": true,
      "serverSide": true,
      "bRetrieve": true,
      "bProcessing": true,
*/
      "ajax": {
            "url": "{{ url('index_ajax') }}",
            "type": "GET",
            "data" : {
            "fecha_desde":  $("#fecha_desde").val(),
            "fecha_hasta":  $("#fecha_hasta").val(),
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
                  {"data":"nombre","visible": true, "title" : "Nombre", "orderable": false},
                  {"data":"cargo","visible": true, "title" : "Cargo", "orderable": false},
                  {"data":"cuit","visible": true, "title" : "CUIT", "orderable": false},
                  {"data":"viatico","visible": true, "title" : "Viaticos $", "orderable": true},
                  {"data":"cantidad","visible": true, "title" : "Cantidad de Dias", "orderable": true}
                  ,{
                            "data": null,
                            "render": function ( data, type, full, meta ) {
  //                                  var str = "{{ URL::to('pdf/create/ID') }}";
//                                    var res = str.replace("ID", data.id);
                                    return "<button type='button' id='btnModal' class='btn btn-outline-secondary' data-toggle='modal' data-target='#modal' data-agente_id = '" + data.agente_id +"'><span class='fa fa-search'></span></button>";}
// return "<button id='btnModal' type='buttom' data-toggle='modal' data-id_safyc=' " + data.nombre + " ' data-id_jurisdiccion=' " + data.nombre + " ' data-target='#myModal' class='btn btn-info btn-flat' width='30px' ><i class='glyphicon glyphicon-arrow-right'></i></a>";}
                                , "title" : "Mas info"},

                ],
      "createdRow": function( row, data, dataIndex){
            },
      "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "TODOS"]]

    });



  $('#datatable-responsive_filter').hide();
  $('#datatable-responsive select option:contains("it\'s me")').prop('selected',true);
  $('#datatable-responsive thead th').each( function (row, i, start, end, display ) {
    if(row != 3 && row != 4 && row != 5){
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar por '+title+'" />' );
    }
  });


  table.columns().every( function () {
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
var numero = 0;

var datos = [];


function wordWrap(str, maxWidth) {
    var newLineStr = "<br>"; done = false; res = '';
    do {
        found = false;
        // Inserts new line at first whitespace of the line
        for (i = maxWidth - 1; i >= 0; i--) {
            if (testWhite(str.charAt(i))) {
                res = res + [str.slice(0, i), newLineStr].join('');
                str = str.slice(i + 1);
                found = true;
                break;
            }
        }
        // Inserts new line at maxWidth position, the word is too long to wrap
        if (!found) {
            res += [str.slice(0, maxWidth), newLineStr].join('');
            str = str.slice(maxWidth);
        }

        if (str.length < maxWidth)
            done = true;
    } while (!done);

    return res + str;
}

function testWhite(x) {
    var white = new RegExp(/^\s$/);
    return white.test(x.charAt(0));
};


function cargarDetalle (fecha_desde, fecha_hasta, agente_id ){

function format ( d ) {
  var total = (d.monto * d.dias);

    return '<b> Agentes: </b>' + wordWrap(d.agentes, 30) +
//    wordwrap(d.agentes, 5, "\n", true) +
          '<br><b> Destinos: </b>'+ wordWrap(d.destinos, 30) +
           '<br><b> Fecha de salida: </b>'+ d.fecha_salida +
           '<br><b> Dias: </b>'+ d.dias + '($' + d.monto + ' por dia)' +
           '<br><b> Monto total percibido: </b>$'+ total;
}


      var dt = $('#datatable-detalle').DataTable({
      "responsive" :true,
      "ajax": {
            "url": "{{ url('detalle_ajax') }}",
            "type": "GET",
            "data" : {
            "fecha_desde":  fecha_desde,
            "fecha_hasta":  fecha_hasta,
            "agente_id":  agente_id,
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
//    $('#datatable-detalle tbody').on( 'click', 'tr td.details-control', function () {
  $('#datatable-detalle tbody').on( 'click', 'tr', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        var indice = $('#datatable-detalle').DataTable().row( this ).index();

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


  $('#datatable-detalle_filter').hide();
  $('#datatable-detalle select option:contains("it\'s me")').prop('selected',true);
  $('#datatable-detalle thead th').each( function (row, i, start, end, display ) {
    if(row !=2){
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

    $('#datatable-detalle').DataTable().destroy();


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
@stop
