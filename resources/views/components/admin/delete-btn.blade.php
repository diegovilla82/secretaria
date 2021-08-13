@props([
  'event',
  'key',
  'classes' => null,
  'title'   => 'Eliminar',
  'text'    => 'Desea eliminar este elemento?'

])
 
 </button>
  <button type="button" class="btn-sm btn-danger btn-primary {{ $classes }}" data-toggle="modal" data-target="#modal{{ $key }}">
    <span class="fa fa-trash" aria-hidden="true"></span>
  </button>
  <div class="modal fade" id="modal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $key }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal{{ $key }}Label">Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ $text }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal"  wire:click="{{ $event }}({{ $key }})" >Eliminar</button>
        </div>
      </div>
    </div>
  </div>