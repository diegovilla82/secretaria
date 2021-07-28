<div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Agente</th>
                <th>Concepto</th>
                <th>Monto</th>
                <th>Editar</th>
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
                    {{ $gasto->importe }}
                </td>
                <td>
                Boton
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia no hay gastos</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
        {{ $gastos->links() }}
</div>
