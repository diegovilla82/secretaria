<x-admin.base title="Detalles de la comision">
  <x-admin.back-btn route="lw" />
   <x-admin.card>
      <livewire:admin.comision.show-comision :agente='request()->id' >
    </x-admin.card>
</x-admin>