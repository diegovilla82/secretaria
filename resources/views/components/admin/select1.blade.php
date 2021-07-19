@props(
    ['title'      => '', 
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
    'id'    => false
])

<div class="{{ $classes }}">
        <select 
            class="form-control" 
            wire:model.defer='{{ $model }}'
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
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
</div>