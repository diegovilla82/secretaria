<div class="modal fade" id="modalTipoResolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Tipo de Resolucion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formTipoResolucion" method="POST" action="{{ url('tipo_resolucion') }}" accept-charset="UTF-8">
      @csrf
            <div id="mensaje_alerta" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <p> Se agrego el nuevo tipo de resolucion</p>
            </div>

<div class="form-row align-items-center">
    <div class="col-md-3">
    <label> Nombre: </label>
    </div>
    <div class="col-md-6">
            <input type="text" class="form-control" id= "nombre" name="nombre" required="">
    </div>
</div>
<br>
<!--CHECKS -->

<div class="form-check-inline">
  <label class="form-check-label">
    <input id="agente" name="agente" type="checkbox" class="form-check-input" value="1"> Agente
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="anio" name="anio" type="checkbox" class="form-check-input" value="1"> Año
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="beneficiario" name="beneficiario" type="checkbox" class="form-check-input" value="1"> Beneficiario
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="dias" name="dias" type="checkbox" class="form-check-input" value="1"> Dias
  </label>
</div>

<div class="form-check-inline">
  <label class="form-check-label">
    <input id="entidad" name="entidad" type="checkbox" class="form-check-input" value="1"> Entidad
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="exp_act" name="exp_act" type="checkbox" class="form-check-input" value="1"> Exp/act
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="obra" name="obra"type="checkbox" class="form-check-input" value="1"> Obra
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="monto" name="monto" type="checkbox" class="form-check-input" value="1"> Monto
  </label>
</div>

<div class="form-check-inline">
  <label class="form-check-label">
    <input id="numero" name="numero" type="checkbox" class="form-check-input" value="1"> Numero
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="programa" name="programa" type="checkbox" class="form-check-input" value="1"> Programa
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input id="localidad" name="localidad" type="checkbox" class="form-check-input" value="1">Localidad
  </label>
</div>
<!-- END CHECKS -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btnTipoResolucion" type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>
