@props([
    'title', 
    'model', 
    'classes'     => null,
    'hint'        => null,
    'required'    => false,
    'disabled'    => false,
    'placeholder' => null,
    'tabindex'    => 1,
    'rows'        => 3,
])

<div class="{{ $classes }}">

    <div class="form-group">
        <label>{{ $title }}</label>
        <textarea 
            class="form-control" 
            wire:model.lazy='{{ $model }}'
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            tabindex={{ $tabindex }}
            rows={{ $rows }}
            id="ckeditor-{{ $model }}"
        ></textarea>
        <small class="form-text text-muted">{{ $hint }}</small>
        @error($model) <div class="text-danger">{{ $message }}</div> @enderror
    </div>

   
</div>