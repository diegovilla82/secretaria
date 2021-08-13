<div class="container">
    <div class="row">
    <div class="form-group">
            <label>Destino</label>
            <select 
                class="form-control" 
                wire:model.lazy='destinoSelected'
                tabindex=1
            >
            
            <option selected>Seleccione un destino</option>
            @foreach ($destinos as $destino)
                <option value="{{ $destino->id }}">{{ $destino->nombre }}</option>
            @endforeach
            </select>
        </div>

    </div>
    <button class="btn btn-primary btn-sm mx-auto btn-block" wire:click="save"> Guardar</button>

</div>