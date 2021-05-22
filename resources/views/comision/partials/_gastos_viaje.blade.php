<div class="card" id="div_gastos_pasaje" style ="display : none;">
                <div class="card-header">
                    Gastos viaje<strong> Avion/Colectivo</strong>
                </div>
    <div class="card-body card-block">
        <div class="form-row align-items-center" >
            <div class="col-md-2" id="lbl_agente_pasaje">
                <label> Agente: </label>
            </div>
            <div class="col-md-6">
                <select class="js-example-basic-multiple form-control" id= "agente_pasaje" name="agente_pasaje[]" multiple="multiple" style="width: 100%">
                    @foreach($agentes as $l)
                        <option value="{{$l->id}}">{{$l->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
    </div>
</div>
