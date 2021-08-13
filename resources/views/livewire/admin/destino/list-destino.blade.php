<div>
    @forelse ($destinos as $destino)
        {{ $destino->getDestinos()->nombre }}
        <x-admin.delete-btn key="{{ $destino->id }}"  event='subtract_destino' />|
    @empty
        <p>No hay destinos cargados</p>
    @endforelse
</div>
