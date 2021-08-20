<x-admin.base>
  <x-admin.back-btn route="comisiones_lw.index" />
 <x-admin.card title="Editar comision">
  <livewire:admin.comision.edit-comision :comision='request()->id'>
  </x-admin.card>
</x-admin>