 <x-admin.card title="Datos de la resolucion">
    <div id = "error_resolucion_existente" class="alert alert-danger" role="alert"  style="display:none">
        <button type="button" id="closeAlert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p id= "error_resolucion_existente_texto"></p>
    </div>
    <div class="form-row align-items-center">                            
        <x-admin.select 
            model="titulo_selected" 
            title="Tipo Res:" 
            :values="$tipo_resolucion" 
            classes="col-md-2" 
            tabindex=1
        />
        <x-admin.input :disabled="$disabled" title="Resolucion" model="resolucion.resolucion" required=true tabindex=2 classes="col-md-2"/>
        <x-admin.input :disabled="$disabled" title="Fecha" model="resolucion.fecha" required=true tabindex=3 classes="col-md-2"/>
    </div>
</x-admin.card>