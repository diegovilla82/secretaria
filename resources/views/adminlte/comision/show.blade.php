<x-admin.base title="Detalles de la comision">
  <x-admin.back-btn route="conisiones_agente_lw.index" />
   <x-admin.card>
      <livewire:admin.comision.show-comision :agente='request()->id' >
    </x-admin.card>
</x-admin>