<x-admin.card title="Datos de la comision">
    <div id = "error_comision" class="alert alert-danger" role="alert" style="display:none">
        <p id= "text_error_comision"> <b>ERROR:</b> Debe seleccionar una provincia/localidad para continuar'</p>
    </div>

    <div class="row">
        <x-admin.input :disabled="$disabled" title="Fecha Salida" model="comision.fecha_salida" required=true tabindex=1 classes="col-md-6"/>
        <x-admin.input :disabled="$disabled" title="Dias" model="comision.dias" required=true tabindex=1 classes="col-md-6"/>
    </div>
        {{-- EXP/ACT --}}
        <div class="row">
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
        </div>
        <br>
        {{-- LOCALIDADADES --}}
        <div class="row">
            <x-admin.checkbox 
                title="Fuera de la provincia?" 
                model="comision.externo" 
                tabindex=3 
                classes="col-md-6"
            />
            <x-admin.select 
                model="destino_selected" 
                title="Destino:" 
                :values="$destinos" 
                multi=true
                classes="col-md-5" 
                tabindex=1
            />

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
</x-admin.card>