@props([
    'model', 
    'title'    => null,
    'hint'     => null,
    'type'     => 'text',
    'classes'  => null,
    'tabindex' => 1,
    'id'
])

<div class="{{ $classes }}">
  <div class="upload-btn-wrapper form-group">
    <label>{{ $title }}</label>
    <input type="file" id='{{ $id }}' wire:model.lazy='{{ $model }}' tabindex={{ $tabindex }} />
    <small class="form-text text-muted">{{ $hint }}</small>
    @error($model) <div class="text-danger">{{ $message }}</div> @enderror
  </div>
</div>