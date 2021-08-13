<div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr style="font-size: 14px;">
                <th>Destino</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($destinos as $destino)
            <tr style="font-size: 14px;">
                <td>
                    {{ $destino->getDestinos()->nombre }}
                </td>
                <td>
                    <x-admin.delete-btn key="{{ $destino->id }}"  event='subtract_destino' />
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
