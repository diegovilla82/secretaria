<div class="row">
    <div class="form-group w-100">
        <label>Agente</label>
        <select
            class="form-control"
            wire:model.lazy='agente_id'
            tabindex=2
        >
            @foreach ($agentes as $agente)
                <option value="{{ $agente->id }}" >{{ $agente->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>
