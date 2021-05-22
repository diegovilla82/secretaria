<div class="card">
    <div class="card-header">
        Datos <strong>Comision</strong>
    </div>
    <div class="card-body card-block">
        <div id = "error_comision" class="alert alert-danger" role="alert" style="display:none">
            <p id= "text_error_comision"> <b>ERROR:</b> Debe seleccionar una provincia/localidad para continuar'</p>
        </div>
        <div class="form-row ">
                <div class="col">
                    <label> Fec. Salida. : </label>
                </div>
                <br><br>
                <div class="col">
                    {{-- <input id="fecha_salida" name="fecha_salida" class="form-control" type="date" value ="@if( isset($comision->fecha_salida) ){{ Carbon\Carbon::parse($comision->fecha_salida)->format('d-m-Y') }}@endif"/> --}}
                     {{  Form::date('fecha_salida', \Carbon\Carbon::now(), ['class' => 'form-control', 'id'=> 'fecha_salida' ]) }}
                </div>

                <div class="col">
                        <label> Dias: </label>
                </div>
                <div class="col">
                    <input type="number" class="form-control" id= "dias" name="dias" required="" value= "1">
                </div>
        </div>
        <br>
        {{-- EXP/ACT --}}
        <div class="form-row align-items-center">
                <div class="col-md-2">
                    <label> Act/Exp: </label>
                    <input type="checkbox" id="act_exp" name="act_exp" value="1"/>
                </div>
                <div class="col-auto">
                    <select class="form-control" id="exp1" name="exp1">
                        <option>E</option>
                    </select>
                </div>
                <div class="col-auto" style="width:70px">
                    <input type="number" disabled class="form-control" id= "exp2" name="exp2" value="10" placeholder="10">
                </div>
                <div class="col-auto" style="width:90px">
                    <input type="number" disabled class="form-control" id= "exp3" name="exp3" placeholder="Año" value="2019">
                </div>
                <div class="col-auto" style="width:180px">
                    <input type="text" disabled class="form-control" id= "exp4" name="exp4" placeholder="Numero" value="">
                </div>
                <div class="col-auto">
                    <select class="form-control" disabled id="exp5" name="exp5">
                        <option>A</option>
                        <option>E</option>
                    </select>
                </div>
                <div class="col-md-1">
                </div>
        </div>
        <br>
        {{-- LOCALIDADADES --}}
        <div class="form-row align-items-center">
            <div class="col-md-2">
                <label> Fuera de la provincia? : </label>
            </div>
            <div class="col-md-1">
                <input type="checkbox" id="externo" name="externo" value="1"/>
            </div>
            <div class="col-md-2">
                <label id="destino"> Localidades : </label>
            </div>
            <div class="col-md-4">
                <div id='div_localidades'>
                    <select class="js-example-basic-multiple form-control" id= "localidades" name="localidades[]" multiple="multiple">
                        @foreach($localidades as $l)
                            <option value="{{$l->id}}">{{$l->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                   <div id='div_provincias'  style="display:none">
                    <select class="js-example-basic-single" id="provincias" name="provincias" style="width: 100%">
                    <option disabled selected value> </option>
                        @foreach($provincias as $l)
                            <option value="{{$l->id}}">{{$l->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>

        <div class="form-row align-items-center" >
                <div class="col-md-3">
                    <label> Comision Pasaje: </label>
                </div>
                <div class="col-md-1">
                    <input type="checkbox" id="check_pasaje" name="check_pasaje" value="1"/>
                </div>
                <div class="col-md-2">
                    <label> Auto </label>
                </div>
                <div class="col-md-1">
                    <input type="checkbox" id="check_vehiculo" name="check_vehiculo" checked="checked"/>
                </div>
        </div>
        <br>
        <div class="form-row align-items-center">
            <div class="col-md-2">
                <label> Posee gastos extra? : </label>
            </div>
            <div class="col-md-1">
                <input type="checkbox" id="check_gastos" name="check_gastos" value="1"/>
            </div>
        </div>
    </div>
</div>
