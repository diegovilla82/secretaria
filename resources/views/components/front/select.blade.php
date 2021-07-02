@props(
    ['title', 
    'model', 
    'values'      => [],
    'classes'     => null,
    'hint'        => null,
    'required'    => false,
    'disabled'    => false,
    'placeholder' => null,
    'tabindex'    => 1,
    'multi'       => false,
    'noOpcion'    => false,
    'default'     => ''
])

<div class="{{ $classes }}">
    <div class="form-group">
        <label>{{ $title }}</label>
        <select 
            class="form-control" 
            wire:model.lazy='{{ $model }}'
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            @if ($multi) multiple @endif
            tabindex={{ $tabindex }}
        >
            @if ($noOpcion) 
            <option value="">{{ $noOpcion }}</option>
            @endif
            @foreach ($values as $key => $value)
                <option value="{{ $key }}" @if($default == $value) selected="selected" @endif >{{ $value }}</option>
            @endforeach
        </select>
        <small class="form-text text-muted">{{ $hint }}</small>
    </div>
</div>