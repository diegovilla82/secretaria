<div class="card" id="div_gastos_vehiculo">
            <div class="card-header">
                Datos <strong>Agentes en vehiculo</strong>
            </div>
            <div class="card-body card-block">

                        <div class = "form-row align-items-center">
                            <div class="col-auto" >
                                <label> Marca y modelo: </label>
                            </div>
                            <div class="col-auto">
                                    <input type="text" class="form-control" id= "marca_modelo" name="marca_modelo"  placeholder="EJ: Honda FIT 2012">
                            </div>
                        </div>
                        <br>
                        <div class = "form-row align-items-center">
                            <div class="col-auto" >
                                <label> Patente: </label>
                            </div>
                            <div class="col-auto">
                                    <input type="text" class="form-control" id= "patente" name="patente">
                            </div>

                            <div class="col-md-3">
                                <label> Combustible ($): </label>
                            </div>

                            <div class="col-md-3">
                                <input type="number" step="0.01" class="form-control" id= "combustible" name="combustible" value="0">
                            </div>
                        </div>
                        <br>
                        <div class="form-row align-items-center">

                                <div class="col-md-2">
                                <label> Agente: </label>
                                </div>
                                <div class="col-md-6">
                                <select class="js-example-basic-multiple form-control" id= "agente" name="agente[]" multiple="multiple" style="width: 100%">
                                    @foreach($agentes as $l)
                                        <option value="{{$l->id}}">{{$l->nombre}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalAgente"><span class="fa fa-plus"></span></button>
                        </div>
                        <br>
                        <div class="form-row align-items-center" >
                            <div class="col-md-2" id= "lbl_chofer">
                                <label> Chofer: </label>
                            </div>
                            <div class="col-md-6" id= "div_chofer">
                                <select class="js-example-basic-single form-control" id= "chofer" name="chofer" style="width: 100%">
                                <option disabled selected value> </option>
                                @foreach($agentes as $l)
                                    <option value="{{$l->id}}">{{ $l->nombre }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                    </div>

                </div>
                <button type="button" class="btn btn-secondary float-right"  data-target="#myModalGanador" id="btnModal">Aceptar</button>
            </div>
        </div>
