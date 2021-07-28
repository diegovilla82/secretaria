<div class="container">
    @include('livewire.admin.gasto.form')
    <button class="btn btn-primary btn-sm mx-auto float-right" wire:click="save_gasto"> Guardar</button>

 @section('js')
    <script>
        Livewire.on('newDocumentationModal', result => {
            $('#modal' + result).modal('toggle');
            $(".modal-backdrop").remove();
        })
    </script>
@stop
</div>