<x-admin.base >
 <x-admin.card title="Editar comision">
  <livewire:admin.comision.edit-comision :comision='request()->id'>
  </x-admin.card>
 <x-admin.card title="Gastos">
 <x-front.modal key="Installer" classes="btn-primary btn-sm float-right" title="Agregar Gasto">
    <livewire:admin.gasto.new-gasto :comision='request()->id'>
  </x-front>
  <br>
  <br>
  <livewire:admin.gasto.list-gasto :comision='request()->id'>
  </x-admin.card>
</x-admin>