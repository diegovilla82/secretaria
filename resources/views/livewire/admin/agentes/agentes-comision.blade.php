<div>
     <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                 <th></th>
                <th>Nombre y Apellido</th>
                <th>Cuil</th>
                <th>Cargo</th>
                <th>Monto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agentes as $agente)
            <tr style="font-size: 14px;">
                <td>
                    @if($agente->pivot->chofer)  <i class="fas fa-fw fa-shuttle-van"></i>@else  <i class="fas fa-fw fa-user"></i> @endif
                </td>
                <td>
                    {{ $agente->nombre}}
                </td>
                <td>
                    {{ $agente->cuit }}
                </td>
                <td>
                    {{ $agente->cargo->nombre }}
                </td>
                 <td>
                    {{'$ '. $agente->pivot->monto }}
                </td>
                <td>
                    <x-admin.delete-btn key="{{ $agente->id }}"  event='subtract_agente' />
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia no hay agentes asignados</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
        {{-- {{ $agentes->links() }} --}}
</div>
