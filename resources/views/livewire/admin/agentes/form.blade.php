<div class="row">
    <x-admin.input :disabled="$disabled" title="Nombre y apellido" model="agente.nombre" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="CUIT" model="agente.cuit" required=true tabindex=1 classes="col-md-12" />
    <x-admin.select 
        model="situacion_revista_selected" 
        title="Situacion de revista:" 
        :values="$situaciones_revista" 
        classes="col-md-12" 
        tabindex=1
    />
    <x-admin.input :disabled="$disabled" title="Situacion de revista" model="agente.situacion_revista_id" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Escalafon" model="agente.escalafon_id" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Categoria" model="agente.categoria_id" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Apartado" model="agente.cargo_id" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Ceic" model="agente.ceic" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Grupo" model="agente.numero" required=true tabindex=1 classes="col-md-12" />
</div>