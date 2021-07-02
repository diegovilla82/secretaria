@props([
    'title', 
    'model', 
    'type'        => 'text',
    'classes'     => null,
    'hint'        => null,
    'required'    => false,
    'disabled'    => false,
    'noComplete'  => false,
    'placeholder' => null,
    'tabindex'    => 1
])

<div class="{{ $classes }}">
    <div class="form-group">
        <label>{{ $title }}</label>
        <input 
            type="{{ $type }}" 
            class="form-control" 
            wire:model.lazy='{{ $model }}'
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            @if ($noComplete) autocomplete="off" @endif
            tabindex={{ $tabindex }}
             
        >
        <small class="form-text text-muted">{{ $hint }}</small>
        @error($model) <div class="text-danger">{{ $message }}</div> @enderror
    </div>
</div>