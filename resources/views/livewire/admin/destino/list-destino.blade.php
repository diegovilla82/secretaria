<div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Fuera de la provincia</th>
                <th>Destino</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($destinos as $destino)
            <tr style="font-size: 14px;">
                <td>
                    {{ $destino->externo ? 'Si' : 'No' }}
                </td>
                <td>
                    {{ $destino->getDestinos()->nombre }}
                </td>
                <td>
                {{ $destino->id }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>No hay destinos cargados</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
</div>
