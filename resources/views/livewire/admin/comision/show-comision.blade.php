<div>
<table class="table table-sm">
    <thead>
        <tr>
            <th>Res.</th>
            <th>Act/Exp</th>
            <th>Agentes</th>
            <th>Destinos</th>
            <th>Salida</th>
            <th>Dias</th>
        </tr>
    </thead>
    <tbody>
        @forelse ( $agente->comisiones as $comision )
            <tr>
                <td> {{ $comision->resolucion->numero }} </td>
                <td> {{ $comision->act_exp ? $comision->act_exp : 'S/N' }} </td>
                <td> 
                    @foreach( $comision->agentes as $agente )
                      {{$agente->nombre}} <br>
                    @endforeach 
                </td>
                <td> {{$comision->destinosLW()}} </td>
                <td> {{ date('d/m/Y', strtotime($comision->fecha_salida)) }}</td>
                <td> {{ '$' . ( $comision->montoComisionLW($agente->id)  * $comision->dias) . '(' .$comision->dias . 'Día)' }} </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>No hay detalles</p>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>