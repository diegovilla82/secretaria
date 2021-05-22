@extends('adminlte::page')

@section('title', 'Comisiones')

@section('content_header')
    <h1>Cargar Resolución</h1>
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


    <div class="clearfix"></div>

<form id="form" method="POST" action="{{ route('comision.store') }}" accept-charset="UTF-8">
    @csrf
    <br>
    {{-- DATOS DE LA RESOLUCION --}}
    @include('comision.partials._datos_resolucion')

    <div class = "row" id ="comisiones">
        <!-- COMIENZO DE COLUMNAS DE 6 -->
        <div class="col-md-6">
            @include('comision.partials._datos_comision')
        </div>

        <div class="col-md-6">


            @include('comision.partials._gastos_viaje')

            {{-- AGENTES EN VEHICULOS --}}
            @include('comision.partials._agentes_en_vehiculos')


            <!-- Modal -->
            <div class="modal fade" id="myModalGanador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image: url({{ url('assets/images/fondo.jpg') }}) ; background-position: center; ">
                <div class="modal-dialog modal-lg" role="document"  style="opacity:0.9 !important; top: 15%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col text-center">
                                <h2 id="modal_titulo"> <b><u> DATOS DE LA COMISION </b></u>  </h2>
                                <div id = "error_resolucion" class="alert alert-danger" role="alert" style="display:none"><p id= "text_error_resolucion"></p></div>
                            </div>
                        </div>

                        <div class="modal-body" id = "modal_ganador_texto" style="font-size:30px; color: black;"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btn_modal" id="btnEnviar1" name="btnGanador" class="btn btn-outline-secondary"> Aceptar </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
</form>


<!-- Modal tipo de resoluciones-->
    @include('comision.partials._tipo_resolucion')
<!-- END MODAL -->



<!-- Modal -->
    @include('comision.partials._datos_agente')
<!-- END MODAL -->
@stop
@section('js')

<script>
$.ajax({
    type: "GET",
    url: "{{ URL::to('listar_tipos_de_resoluciones') }}",
    success: function(array) {
        array.forEach(function(element) {
            arreglojson.push(element)
        });
    }
}).responseJSON;

$("#tipo_resolucion").change(function() {

    if($('#tipo_resolucion option:selected').text() == "COMISIÓN"){
        $('#comisiones').show();
        $('#otras_resoluciones').hide();
    } else {
        $('#comisiones').hide();
        $('#otras_resoluciones').show();
    }
    var searchTerm = $('#tipo_resolucion option:selected').text();


    $("#agente_div").hide();
    $("#agente_lbl_div").hide();
    var searchTerm = $('#tipo_resolucion option:selected').text();

    for (var i = 0; i < arreglojson.length; i++){
        if (arreglojson[i].text == searchTerm){
            for (var valor in arreglojson[i]) {
                if(arreglojson[i][valor] == 0){
                    $('#' + valor + '_div').hide();
                    $('#' + valor + '_lbl_div').hide();
                } else {
                    $('#' + valor + '_div').show();
                    $('#' + valor + '_lbl_div').show();
                }
            }
        }
    }

})


var arreglojson = [];


$( "#btnTipoResolucion" ).click(function() {

    var url = "{{ URL::to('tipo_resolucion') }}";
    var ultimo;

   $.ajax({
        type: "post",
        url: url,
        data: $("#formTipoResolucion").serialize(),
        success: function(result)
        {
            arreglojson = [];

            result.lista_full.forEach(function(element) {
                arreglojson.push(element)
            });

            $('#mensaje_alerta').toggle(3000);
            setTimeout(function ()
            {
                $('#modalTipoResolucion').modal('toggle');
            }, 3700);

            ultimo = $("#nombre").val();

            $('#tipo_resolucion').select2({
                data: result.lista_select,
                theme: 'bootstrap4',
                allowClear: true
                });

            $('#tipo_resolucion option').eq(result.lista_select.length).prop('selected', true);
            $('#tipo_resolucion').trigger('change');
        }
       });
});


$(document).ready(function() {
    $('#tipo_resolucion option:contains("COMISIÓN")').prop('selected',true);

    $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

    // $('#fecha').datepicker({ locale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4' });
    // $('#fecha_salida').datepicker({ locale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4' });

    $('.js-example-basic-multiple').select2({ theme: 'bootstrap4', placeholder: "Elija una opcion", allowClear: true});
    $('.js-example-basic-single').select2({ theme: 'bootstrap4', placeholder: "Elija una opcion", allowClear: true });

});


$("#check_vehiculo").change(function(){
    ($("#check_vehiculo").is(":checked")) ?  $("#div_gastos_vehiculo").show()  : $("#div_gastos_vehiculo").hide();
});

$("#check_pasaje").change(function(){
    ($("#check_pasaje").is(":checked")) ?  $("#div_gastos_pasaje").show()  : $("#div_gastos_pasaje").hide();
});

$("#act_exp").change(function() {
    ( $("#act_exp").is(":checked") ) ? $("#exp1").removeAttr('disabled') : $("#exp1").attr('disabled','disabled');
    ( $("#act_exp").is(":checked") ) ? $("#exp2").removeAttr('disabled') : $("#exp2").attr('disabled','disabled');
    ( $("#act_exp").is(":checked") ) ? $("#exp3").removeAttr('disabled') : $("#exp3").attr('disabled','disabled');
    ( $("#act_exp").is(":checked") ) ? $("#exp4").removeAttr('disabled') : $("#exp4").attr('disabled','disabled');
    ( $("#act_exp").is(":checked") ) ? $("#exp5").removeAttr('disabled') : $("#exp5").attr('disabled','disabled');
})

$("#agente").change(function() {
    var str_array = $('#agente').val();
    var array = $('#agente option:not(:selected)');


    var $dropdown = $("#chofer");
    $dropdown.empty();
    $.each(array, function() {
        $dropdown.append($("<option />").val(this.value).text(this.text));
    });

    $("#chofer").val("null").trigger("change");
//    $('#chofer').select2('open');
    });

    $(document).on('focus', '.select2', function (e) {
        if (e.originalEvent) {
        $(this).siblings('select').select2('open');
        }
    });

$("#btnModal").click(function(){

    if( ($("#externo").is(':not(:checked)')  && ( $("#localidades option:selected").text().length < 2 ) )  || ($("#externo").is(":checked") && ( $("#provincias option:selected").text().length < 2 ) ) )  {
        $("#provincias").focus();
        $("#error_comision").show();
    } else {

        $("#error_comision").hide();
        $('#myModalGanador').modal("show");
        $('#btnModal').prop('disabled', false);
    }
})


$("#externo").change(function(){
    if($("#externo").is(":checked")){
        $('#destino').text('Provincia: ');
        $('#div_localidades').hide();
        $('#div_provincias').show();

    } else {

        $('#destino').text('Localidades: ')
        $('#div_localidades').show();
        $('#div_provincias').hide();

    }
});


/*
$('#modalTipoResolucion').on('show.bs.modal', function(e) {
    $('#nombre').focus();
});
*/

$('#myModalGanador').on('show.bs.modal', function(e) {

    var empleados = $("#agente").val() + ',' +  ($("#chofer").val()) + ',' + $("#agente_pasaje").val();
    var texto_html = '';
    var ext = $("#externo").is(":checked") ?  2 : 1;

    $("#modal_ganador_texto").html('');

    ( $("#fecha").val().length > 0 ) ? $("#modal_ganador_texto").append('<br><b> Fecha: </b>' + $("#fecha").val() ) : '';
    ( $("#resolucion").val().length > 0 ) ? $("#modal_ganador_texto").append('<br><b> Resolucion: </b>' + $("#resolucion").val() ) : '';
    ( $("#exp4").val().length > 0 ) ? $("#modal_ganador_texto").append('<br><b>Act/exp : </b>' +  $("#exp1").val() + '-' + $("#exp2").val() + '-' + $("#exp3").val() + '-' + $("#exp4").val() + '-' + $("#exp5").val() ) : '';



    if($("#externo").is(":checked")){
        $("#modal_ganador_texto").append('<br><b>Fuera de la provincia: </b>' +  $("#provincias option:selected").text() )
    } else {
       ($("#localidades option:selected").text()) ? $("#modal_ganador_texto").append('<br><b>Localidades :</b>' + $("#localidades option:selected").text() ) : '' ;
    }

    ( $("#dias").val().length > 0 ) ? $("#modal_ganador_texto").append('<br><b> Dias: </b>' + $("#dias").val() ) : '';
    ( $("#combustible").val()> 0 ) ? $("#modal_ganador_texto").append('<br><b> Combustible($): </b>' + $("#combustible").val() ) : '';
    ( $("#gastos").val()> 0 ) ? $("#modal_ganador_texto").append('<br><b> Otros gastos($): </b>' + $("#gastos").val() ) : '';

    if ($("#agente option:selected").text().length >0) {
        $("#modal_ganador_texto").append('<br><b>Agente/s: </b> <br>');
        $.ajax({
                type: "GET",
                url: "{{ URL::to('comision_confirmacion') }}",
                data: {'empleados' : empleados, 'dias' : $("#dias").val(), 'externo' : ext , 'resolucion' : $("#resolucion").val() },
                success: function(array)
                {
                    if(array[0].resolucion_existente == 0){
                        $("#error_resolucion").hide();
                        $("#error_resolucion").html('');
                        $('#btn_modal').prop('disabled', false);
                    } else {
                        $("#error_resolucion").show();
                        $("#error_resolucion").html('<b>ERROR:</b> El numero de resolucion <b>' + $("#resolucion").val() + '</b> ya existe, elija otro para continuar');
                        $('#btn_modal').prop('disabled', true);
                    }
                    array.forEach(function(element) {
                    $("#modal_ganador_texto").append(' - ' + element.empleados + '<BR>');
                    });
                }
            });
    }

    });

function dateEs(inputFormat) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(inputFormat);
  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
}


$("#btnOtrasResoluciones").click(function(){

    $.ajax({
        type: "GET",
        url: "{{ URL::to('comision_confirmacion') }}",
        data: {'empleados' : 1, 'dias' : $("#dias").val(), 'externo' : 1 , 'resolucion' : $("#resolucion").val() },
        success: function(array)
        {
            if(array[0].resolucion_existente == 0){
                $("#error_resolucion_existente").hide();
                $("#error_resolucion_existente").html('');
                $("#form").submit();
            } else {
                $("#error_resolucion_existente").show();
                $("#error_resolucion_existente_texto").html('<b>ERROR:</b> El numero de resolucion <b>' + $("#resolucion").val() + '</b> ya existe, elija otro para continuar');
            }
        }
    });

});

$('#closeAlert').on('click', function() {
    $("#error_resolucion_existente").hide();
});


$( "#btnAgente" ).click(function() {

var url = "{{ URL::to('agente') }}";
var ultimo;

$.ajax({
   headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    type: "post",
    url: url,
     data: {
    'nombre' : $("input[name=agente_nombre]").val(),
    'cuit' : $("input[name=agente_cuit]").val(),
    'situacion_revista_id' : $("input[name=agente_situacion_revista_id]").val(),
    'escalafon_id' : $("input[name=agente_escalafon_id]").val(),
    'categoria_id' : $("input[name=agente_categoria_id]").val(),
    'apartado' : $("input[name=agente_apartado]").val(),
    'agente_cargo_id' : $('#agente_cargo_id').val(),
    'ceic' : $("input[name=agente_ceic]").val(),
    'grupo' : $("input[name=agente_grupo]").val(),
    'numero' : $("input[name=agente_numero]").val(),
    '_token': $('input[name=_token]').val(),

},


    success: function(result)
    {
        console.log(result);
        arreglojson = [];

        result.lista_select.forEach(function(element) {
            arreglojson.push(element)
        });

        $('#mensaje_alerta_agente').toggle(3000);
        setTimeout(function ()
        {
            $('#modalAgente').modal('toggle');
        }, 3700);

        ultimo = $("#nombre").val();


        $('#agente').select2({
            data: result.lista_select,
            theme: 'bootstrap4',
            allowClear: true
        });

        $('#chofer').select2({
            data: result.lista_select,
            theme: 'bootstrap4',
            allowClear: true
        });



//            $('#agente_cargo_id option').eq(result.lista_select.length).prop('selected', true);
//            $('#agente_cargo_id').trigger('change');
    }
   });
});


</script>
@stop
