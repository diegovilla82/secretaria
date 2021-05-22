<div class = "row" id="otras_resoluciones" style="display:none">
        <div class="col-md-12">
        <div class="card">

        <div class="card-header">
            Detalle <strong>Resolucion</strong>
        </div>

            <div class="card-body card-block">

            <div class = "row">

              <div class="col-md-1" id="agente_lbl_div">
                <label> Agente: </label>
              </div>
              <div class="col-md-3" id="agente_div">
              <select class="js-example-basic-single" id= "agente_ot" name="agente_ot" style="width: 100%">
                    <option disabled selected value> </option>
                    @foreach($agentes as $l)
                        <option value="{{$l->id}}">{{ $l->nombre }}</option>
                    @endforeach
                    </select>
              </div>

              <div class="col-md-1" id="entidad_lbl_div">
                <label> Entidad: </label>
              </div>
              <div class="col-md-2" id="entidad_div">
                      <input type="text" class="form-control" id= "entidad_ot" name="entidad_ot">
              </div>

              <div class="col-md-1" id="obra_lbl_div">
                <label> Obra: </label>
              </div>
              <div class="col-md-2" id="obra_div">
                      <input type="text" class="form-control" id= "obra_ot" name="obra_ot">
              </div>

              <div class="col-md-1" id="programa_lbl_div">
                <label> Programa: </label>
              </div>
              <div class="col-md-2" id="programa_div">
                      <input type="text" class="form-control" id= "programa_ot" name="programa_ot">
              </div>

              <div class="col-md-1" id="dias_lbl_div">
                <label> Dias: </label>
              </div>
              <div class="col-md-2" id="dias_div">
                      <input type="text" class="form-control" id= "dias_ot" name="dias_ot">
              </div>


              <div class="col-md-1" id="numero_lbl_div">
                <label> Numero: </label>
              </div>
              <div class="col-md-2" id="numero_div">
                      <input type="text" class="form-control" id= "numero_ot" name="numero_ot">
              </div>


                     <div class="col-auto" style="width:130px">
                      <label> Act/Exp: </label>
                    </div>

                    <div class="col-auto">
                        <select class="form-control" id="exp1_ot" name="exp1_ot">
                            <option>E</option>
                        </select>
                    </div>

                    <div class="col-auto" style="width:95px">
                        <input type="number"  class="form-control" id= "exp2_ot" name="exp2_ot" value="10" placeholder="10">
                    </div>

                    <div class="col-auto" style="width:110px">
                        <input type="number"  class="form-control" id= "exp3_ot" name="exp3_ot" placeholder="Año" value="2019">
                    </div>

                    <div class="col-auto" style="width:130px">
                        <input type="Number"  class="form-control" id= "exp4_ot" name="exp4_ot" placeholder="Numero" value="">
                    </div>

                    <div class="col-auto">
                        <select class="form-control"  id="exp5_ot" name="exp5_ot">
                            <option>A</option>
                            <option>E</option>
                        </select>
                    </div>



              <div class="col-md-1" id="beneficiario_lbl_div">
                <label> Beneficiario: </label>
              </div>
              <div class="col-md-2" id="beneficiario_div">
                      <input type="text" class="form-control" id= "beneficiario_ot" name="beneficiario_ot">
              </div>

              <div class="col-auto" id="localidad_lbl_div">
                <label> Localidad: </label>
              </div>
              <div class="col-md-3" id="localidad_div">
                <select class="js-example-basic-single" id= "localidad_ot" name="localidad_ot" style="width: 100%">
                <option disabled selected value> </option>
                    @foreach($localidades as $l)
                        <option value="{{$l->id}}">{{$l->nombre}}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-auto" id="monto_lbl_div">
                <label> Monto: </label>
              </div>
              <div class="col-md-2" id="monto_div">
                      <input type="text" class="form-control" id= "monto_ot" name="monto_ot">
              </div>

              </div>

                <br>
              <div class = "row" id="detalle_div">
                <div class="col-md-1">
                    <label> Detalle: </label>
                </div>
                <div class="col-md-3"><textarea class="form-control" rows="1" id="detalle_ot" name="detalle_ot"></textarea></div>
            </div>

        </div>
          </div>
          <button id="btnOtrasResoluciones" type="button" class="btn btn-secondary float-right">Aceptar</button>

        </div>
</div>
