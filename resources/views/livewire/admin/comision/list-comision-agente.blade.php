<div>
  <x-admin.input title="Nombre" model="parametro" required=true tabindex=6 classes="col-md-6"/>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Agente</th>
                <th>Cargo</th>
                <th>CUIT</th>
                <th>Viaticos</th>
                <th>Dias</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agentes as $agente)
            <tr style="font-size: 14px;">
                <td>
                    {{ $agente->nombre }}
                </td>
                <td>
                @if($agente->cargo)
                    {{ $agente->cargo->nombre }}
                @endif
                </td>
                <td>
                    {{ $agente->cuit }}
                </td>
                <td>
                    @if($agente->montoComisiones())
                        {{ '$' . $agente->montoComisiones() }}
                    @endif
                </td>
                <td>
                    {{ $agente->diasComisiones() }}
                </td>
                <td>
                    <a class="btn-sm btn-primary" href="{{ route('comision_agente_lw.show', $agente->id) }}" role="button">Ver</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia no hay ganadores</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
        {{ $agentes->links() }}
</div>
