<div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Res. (Año)</th>
                <th>Act/exp</th>
                <th>Salida</th>
                {{-- <th>Destinos</th> --}}
                <th>Dias</th>
                <th>Agentes</th>
                <th>Acciones</th>
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
                {{-- <td>
                @if($comision->destinosOld())
                    {{ $comision->destinosOld() }}
                @elseif (count($comision->destinosNew))

                @foreach ( $comision->destinosNew as $destino )
                    {{$destino}}
                @endforeach

                @endif
                </td> --}}
                <td>
                    {{ $comision->dias }}
                </td>
                <td>
                    @foreach( $comision->agentes as $agente )
                      {{$agente->nombre}} <br>
                    @endforeach 
                </td>
                <td>
                    <a class="btn-sm btn-success" href="{{ route('excel', $comision->id) }}" role="button">
                        <span class="fa fa-table" aria-hidden="true"></span>
                     </a>
                     &nbsp;
                    <a class="btn-sm btn-warning" href="{{ route('reporte', $comision->id) }}" role="button">
                        <span class="fa fa-print" aria-hidden="true"></span>
                     </a>
                     &nbsp;
                    <a class="btn-sm btn-info" href="{{ route('comisiones_lw.edit', $comision->id) }}" role="button">
                     <span class="fa fa-search" aria-hidden="true"></span></a>
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
