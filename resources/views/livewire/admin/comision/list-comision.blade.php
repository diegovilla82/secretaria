<div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Res. (Año)</th>
                <th>Act/exp</th>
                <th>Salida</th>
                <th>Destinos</th>
                <th>Dias</th>
                <th>Agentes</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comisiones as $comision)
            <tr style="font-size: 14px;">
                <td>
                    {{ $comision->resolucion->numero . '(' . date('Y', strtotime($comision->resolucion->numero )). ')' }}
                </td>
                <td>
                    {{ $comision->act_exp }}
                </td>
                <td>
                    {{ $comision->fecha_salida }}
                </td>
                <td>
                    {{ $comision->destinosLW() }}
                </td>
                <td>
                    {{ $comision->dias }}
                </td>
                <td>
                    @foreach( $comision->agentes as $agente )
                      {{$agente->nombre}} <br>
                    @endforeach 
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
