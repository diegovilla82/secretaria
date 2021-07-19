<div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Agente</th>
                <th>Concepto</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($gastos as $gasto)
            <tr style="font-size: 14px;">
                <td>
                    {{ $gasto->agente->nombre }}
                </td>
                <td>
                    {{ $gasto->concepto }}
                </td>
                <td>
                    {{ $comision->dias }}
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('reporte', $comision->id) }}" role="button">Generar</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia no hay comisiones</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
        {{ $comisiones->links() }}
</div>
