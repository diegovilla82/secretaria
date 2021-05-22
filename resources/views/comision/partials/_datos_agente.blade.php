<div class="modal fade" id="modalAgente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo agente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="formAgente" method="POST" action="{{ url('agente') }}" accept-charset="UTF-8">
        @csrf
        <div id="mensaje_alerta_agente" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <p> Se agrego el nuevo agente</p>
        </div>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Nombre: </label>
            </div>
            <div class="col-md-7">
                    <input type="text" class="form-control" name="agente_nombre" required="">
            </div>
        </div>
        <br>
        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> CUIT: </label>
            </div>
            <div class="col-md-7">
                    <input type="text" class="form-control" name="agente_cuit" required="">
            </div>
        </div>
        <br>
        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Siutacion_revista: </label>
            </div>
            <div class="col-md-7">
                    <input type="text" class="form-control" name="agente_situacion_revista_id" required="">
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Escalafon: </label>
            </div>
            <div class="col-md-7">
                    <input type="text" class="form-control" name="agente_escalafon_id" required="">
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Categoria: </label>
            </div>
            <div class="col-md-7">
                    <input type="text" class="form-control" name="agente_categoria_id" required="">
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Apartado: </label>
            </div>
            <div class="col-md-7">
                    <input type="text" class="form-control" name="agente_apartado" required="">
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Cargo: </label>
            </div>
            <div class="col-md-7">
                <select class="js-example-basic-single" id="agente_cargo_id" name="agente_cargo_id" style="width: 100%">
                    <option disabled selected value> </option>
                    @foreach($cargos as $c)
                        <option value="{{$c->id}}">{{$c->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Ceic: </label>
            </div>
            <div class="col-md-7">
                    <input type="number" class="form-control" name="agente_ceic" required="">
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Grupo: </label>
            </div>
            <div class="col-md-7">
                    <input type="number" class="form-control" name="agente_grupo" required="">
            </div>
        </div>
        <br>

        <div class="form-row align-items-center">
            <div class="col-md-3">
            <label> Numero: </label>
            </div>
            <div class="col-md-7">
                    <input type="number" class="form-control" name="agente_numero" required="">
            </div>
        </div>
        <br>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button id="btnAgente" type="button" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
  </form>
