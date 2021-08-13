<div>
    @include('livewire.admin.agentes.form-add')
    <button class="btn btn-primary btn-sm mx-auto btn-block" wire:click="save_add_agente"> Guardar</button>

    @section('js')
        <script>
            Livewire.on('newDocumentationModal', result => {
                $('#modal' + result).modal('toggle');
                $(".modal-backdrop").remove();
            })
            window.addEventListener('closeModal', event => {
                $('#modalAddAgente').modal('hide');
            })
        </script>
    @stop
</div>
