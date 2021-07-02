<x-admin.base title="Agregar Noticias">
  <x-admin.back-btn route="lw" />
  <div class="row">
    <div class="col-md-12">
      <livewire:admin.resolucion.new-resolucion>
    </div>
    <div class="col-md-6">
      <livewire:admin.resolucion.new-comision>
    </div>

    <div class="col-md-6">

    </div>
</div>

 @section('js')
    <script>
      // $('#fecha').datepicker({ locale: 'es-es', format: 'dd-mm-yyyy', uiLibrary: 'bootstrap4' });
    </script>
    @stop

</x-admin>

