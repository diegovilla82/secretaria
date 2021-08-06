<div class="container">
    <div class="row">
    @if($externo)
    <div class="form-group">
            <label>Localidad</label>
            <select 
                class="form-control" 
                wire:model.lazy='localidadSelected'
                tabindex=1
            >        
            @foreach ($localidades as $destino)
                <option value="{{ $destino->id }}">{{ $destino->nombre }}</option>
            @endforeach
            </select>
        </div>
        @endif
    </div>

    <button class="btn btn-primary btn-sm mx-auto float-right" wire:click="save"> Guardar</button>

 @section('js')
    <script>
        Livewire.on('newDocumentationModal', result => {
            $('#modal' + result).modal('toggle');
            $(".modal-backdrop").remove();
        })
    </script>
@stop
</div>