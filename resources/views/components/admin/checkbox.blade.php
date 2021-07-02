@props([
    'title', 
    'model', 
    'classes'  => null,
    'hint'     => null,
    'disabled' => false,
    'tabindex' => 1
])

<div class="{{ $classes }}">
        <label class="form-check-label" for="checkbox-{{ $model }}"> <b> {{ $title }} </b></label>
    <div class="form-group form-check">
        <input 
            type="checkbox" 
            class="form-check-input" 
            wire:model.lazy='{{ $model }}'
            @if ($disabled) disabled @endif
            tabindex={{ $tabindex }}
            id="checkbox-{{ $model }}"
        >

        <small class="form-text text-muted">{{ $hint }}</small>
        @error($model) <div class="text-danger">{{ $message }}</div> @enderror
    </div>
</div>