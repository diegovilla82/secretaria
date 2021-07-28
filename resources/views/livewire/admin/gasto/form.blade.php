<div class="row">
 <div class="form-group">
    <label>Concepto</label>
    <select 
        class="form-control" 
        wire:model.lazy='concepto_selected'
        tabindex=3
    >        
    @foreach ($conceptos as $concepto)
        <option value="{{ $concepto }}" @if($concepto == $concepto_selected) selected="selected" @endif >{{ $concepto }}</option>
    @endforeach
     </select>
 </div>
</div>

<div class="row">
    <x-admin.input title="Monto" model="gasto.importe" required tabindex=1 classes="col-md-6"/>
</div>

<div class="row">
    <div class="form-group">
        <label>Agente</label>
        <select 
            class="form-control" 
            wire:model.lazy='agente_id'
            tabindex=2
        >        
        @foreach ($agentes->agentes as $agente)
            <option value="{{ $agente->id }}" @if($agente_id == $agente->id) selected="selected" @endif >{{ $agente->nombre }}</option>
        @endforeach
        </select>
    </div>
</div>