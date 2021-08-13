<table id="agentes">
            <thead>
                <tr>
                    <th>Sr/a</th>
                    <th>CUIL</th>
                    {{-- <th>Mod. Revista</th>
                    <th>Categoria</th>
                    <th>Apartado</th>
                    <th>Cargo</th>
                    <th>CEIC</th> --}}
                    <th>Viaticos</th>
                    <th>Gastos</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($comision->agentes as $agente )            
                <tr>
                    <td> <b> {{$agente->nombre}}</b> </td>
                    <td>{{$agente->cuit}}</td>
                    {{-- <td>{{$agente->situacion_revista_id}}</td>
                    <td>{{$agente->escalafon_id}}</td>
                    <td>{{$agente->categoria_id}}</td>
                    <td>{{$agente->apartado}}</td>
                    <td>{{$agente->cargo->nombre}}</td> --}}
                    <td>{{ '$' . $agente->montoComisiones()}}</td>
                    <td>
                        @foreach ($agente->gastosComision($comision->id) as $gasto )            
                        {{ '$' . $gasto->importe . ' ' . $gasto->concepto }} <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>