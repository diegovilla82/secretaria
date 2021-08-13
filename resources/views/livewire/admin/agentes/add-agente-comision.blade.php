<div>
    @include('livewire.admin.agentes.form-add')
    <button class="btn btn-primary btn-sm mx-auto btn-block" wire:click="save_add_agente"> Guardar</button>


        <script>
            Livewire.on('newDocumentationModal', result => {
                $('#modal' + result).modal('toggle');
                $(".modal-backdrop").remove();
            })
        </script>

</div>
