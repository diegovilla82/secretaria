    <div id="error_comision" class="alert alert-danger" role="alert" style="display:none">
        <p id="text_error_comision"> <b>ERROR:</b> Debe seleccionar una provincia/localidad para continuar'</p>
    </div>

    <div class="row">
        <div class="col-auto">
            <label>Act/Exp</label>
        </div>
        <div class="col-auto">
            <select class="form-control" wire:model.lazy='exp1' id="exp1" name="exp1">
                <option value="E">E</option>
            </select>
        </div>
        <div class="col-auto" style="width:100px">
            <input type="number" class="form-control" wire:model.lazy='exp2' id="exp2" name="exp2" value="10"
                placeholder="10">
        </div>
        <div class="col-auto" style="width:100px">
            <input type="number" class="form-control" wire:model.lazy='exp3' id="exp3" name="exp3" placeholder="Año"
                value="2019">
        </div>
        <div class="col-auto" style="width:180px">
            <input type="text" class="form-control" wire:model.lazy='exp4' id="exp4" name="exp4" placeholder="Numero"
                value="">
        </div>
        <div class="col-auto">
            <select class="form-control" wire:model.lazy='exp5' id="exp5" name="exp5">
                <option value="A">A</option>
                <option value="E">E</option>
            </select>
        </div>
    </div>
    <br>
    @if($isEdit)
        <x-admin.card title="Agentes/Gastos" >
        <div class="row">
            <div class="col-md-6">
            <x-front.modal key="newAgente" classes="btn-primary btn-sm float-right" title="Cargar Agente">
                <livewire:admin.agentes.new-agente :comision='request()->id'>
            </x-front>
            <x-front.modal key="AddAgente" classes="btn-primary btn-sm float-right" title="Agregar Agente a comision">
                <livewire:admin.agentes.add-agente-comision :comision='request()->id'>
            </x-front>
            <br>
            <br>
            <livewire:admin.agentes.agentes-comision :comision='request()->id'>
            </div>

            <div class="col-md-6">
                <x-front.modal key="Gasto" classes="btn-primary btn-sm float-right" title="Agregar Gasto">
                <livewire:admin.gasto.new-gasto :comision='request()->id'>
                </x-front>
                <br>
                <br>
                <livewire:admin.gasto.list-gasto :comision='request()->id'>
            </div>
        </div>
        </x-admin.card>
        @endif


    <div class="row">
        <div class="col-md-2">
            <label> Fuera de la provincia? : </label>
        </div>
        <div class="col-md-1">
            <input type="checkbox" tabindex=3 wire:click="$emit('comisionExterno',  {{ $comision->externo ? 0 : 1 }})" wire:model='comision.externo' id="externo" name="externo" value="1" />
        </div>
        @if($isEdit)
            <div class="col-md-3">
                <x-front.modal key="Destino" classes="btn-primary btn-sm float-left" title="Agregar Destino">
                    <livewire:admin.destino.new-destino :comision='request()->id' :externo="$comision->externo">
                </x-front>
            </div>
        @endif
    </div>
    <br>
    <div class="row">
        @if($isEdit)
            <div class="col-md-12">
            <livewire:admin.destino.list-destino :comision='request()->id'>    
            </div>
        @endif
    </div>
    <br>

    <x-admin.input :disabled="$disabled" title="Motivo" model="comision.motivo" tabindex=2 classes="col-md-12" />

    <div class="row">
        <x-admin.input :disabled="$disabled" title="Marca y modelo" model="comision.marca_modelo" required=true
            tabindex=4 classes="col-md-2" />
        <x-admin.input :disabled="$disabled" title="Patente" model="comision.patente" required=true tabindex=5
            classes="col-md-2" />
        <x-admin.input :disabled="$disabled" title="Dias" model="comision.dias" required=true tabindex=6
            classes="col-md-2" />
        <x-admin.input type="date" :disabled="$disabled" title="Fecha Salida" model="comision.fecha_salida"
            required=true tabindex=7 classes="col-md-2" />

    </div>


    <div class="row">
        <x-admin.input type="date" :disabled="$disabled" title="Fecha Resolucion" model="resolucion.fecha" required=true
            tabindex=7 classes="col-md-2" />

        <x-admin.input type="number" :disabled="$disabled" title="Num. Res." model="resolucion.numero" required=true
            tabindex=7 classes="col-md-2" />
    </div>
@section('js')
<script>
    Livewire.on('newDestinonModal', result => {
        $('#modal' + result).modal('toggle');
        $(".modal-backdrop").remove();
    })
    
    Livewire.on('newGastoModal', result => {
        $('#modal' + result).modal('toggle');
        $(".modal-backdrop").remove();
    })
</script>
@stop