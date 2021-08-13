<div class="row">
    <x-admin.input :disabled="$disabled" title="Nombre y apellido" model="agente.nombre" required=true tabindex=1 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="CUIT" model="agente.cuit" required=true tabindex=2 classes="col-md-12" />
    <x-admin.select 
        required=true
        model="situacion_revista_selected" 
        title="Situacion de revista:" 
        :values="$situaciones_revista" 
        classes="col-md-12" 
        tabindex=3
    />
    <x-admin.select 
        required=true
        model="escalafon_selected" 
        title="Escalafon:" 
        :values="$escalafones" 
        classes="col-md-12" 
        tabindex=4
    />
    <x-admin.select
        model="categoria_selected" 
        title="Categoria:" 
        :values="$categorias" 
        classes="col-md-12" 
        tabindex=5
    />

    <x-admin.input :disabled="$disabled" title="Apartado" model="agente.apartado" required=true tabindex=6 classes="col-md-12" />
    <x-admin.select
        required=true
        model="cargo_selected" 
        title="Cargo:" 
        :values="$cargos" 
        classes="col-md-12" 
        tabindex=7
    />
    <x-admin.input :disabled="$disabled" title="Ceic" model="agente.ceic" required=true tabindex=8 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Grupo" model="agente.grupo" required=true tabindex=9 classes="col-md-12" />
    <x-admin.input :disabled="$disabled" title="Numero" model="agente.numero" required=true tabindex=10 classes="col-md-12" />
</div>