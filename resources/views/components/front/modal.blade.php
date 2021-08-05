@props([
  'event' => null,
  'key' => null,
  'classes' => 'btn-primary',
  'title'   => '',
  'text'    => ''

])
<div>
  <button type="button" class="btn btn-sm {{ $classes }}" data-toggle="modal" data-target="#modal{{ $key }}">
    {{ $title }}
  </button>
  <div class="modal fade" id="modal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $key }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="mbr-fonts-style display-5" id="modal{{ $key }}Label"> {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
