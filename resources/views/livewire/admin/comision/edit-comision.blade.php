<div>
@if (session('success'))
    <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
@endif
@include('livewire.admin.comision.form')
<button class="btn btn-primary btn-sm mx-auto float-right" wire:click="updateComision"> Guardar cambios </button>
</div>
