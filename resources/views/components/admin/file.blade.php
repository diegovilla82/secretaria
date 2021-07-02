@props([
    'model', 
    'title'    => null,
    'hint'     => null,
    'type'     => 'text',
    'classes'  => null,
    'tabindex' => 1,
    'photo'    => null
])

<div class="{{ $classes }}">
  <div class="upload-btn-wrapper form-group">
    <label>{{ $title }}</label>
    <div>
      <button class="btn btn-primary">
        {{ $slot }}
      </button>
    </div>
    <input type="file" wire:model.lazy='{{ $model }}' tabindex={{ $tabindex }} />
    <small class="form-text text-muted">{{ $hint }}</small>
    @error($model) <div class="text-danger">{{ $message }}</div> @enderror
    @if ($photo)
      <div class="position-relative">
        <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail mt-3 rounded">
        <button class="btn btn-danger btn-sm position-absolute" style="bottom: 5px; right: 5px;" wire:click="$set('{{ $model }}', '')">
          <i class="fas fa-trash-alt"></i>
        </button>
      </div>
    @endif
  </div>
</div>