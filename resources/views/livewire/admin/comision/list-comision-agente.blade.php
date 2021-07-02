<div>
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
                    {{ $agente->montoComisiones() }}
                </td>
                <td>
                    {{ $agente->diasComisiones() }}
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.lw.show', $agente->id) }}" role="button">Ver</a>
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
