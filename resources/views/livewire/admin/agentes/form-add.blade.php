<div class="container">
    <div class="row">
        <div class="form-group w-100">
            <label>Agente</label>
            <select
                wire:change="change"
                class="form-control"
                wire:model.lazy='agente_id'
                tabindex=2
            >
            <option value="" >Seleccionar agente</option>
                @foreach ($agentes as $agente)
                    <option value="{{ $agente->id }}" >{{ $agente->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <x-admin.checkbox model="isDriver" title="Es chofer ?" classes="form-check-inline" />
        </div>
    </div>
    <div class="row">
        <div class="form-group">
                <x-admin.input title="Monto ($)" model="monto" />
        </div>
    </div>
</div>

