<x-admin.base title="Agregar Agente">
<x-admin.back-btn route="comisiones_lw.index" />
<x-admin.card title="Datos del agente">
    <livewire:admin.agentes.new-agente>
</x-admin.card>




 @section('js')
    <script>
      // $('#fecha').datepicker({ locale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4' });
    </script>
    @stop

</x-admin>

