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
    'noOpcion'    => false
    'id'    => null
])

<div class="{{ $classes }}">
    <div class="form-group">
        <label>{{ $title }}</label>
        <div wire:ignore>
            <select 
                class="form-control" 
                wire:model.lazy='{{ $model }}'
                @if ($multi) multiple @endif
                tabindex={{ $tabindex }}
                @if ($id) id={{ $id }} @endif
            >
                @if ($noOpcion) 
                <option value="">{{ $noOpcion }}</option>
                @endif
                @foreach ($values as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <small class="form-text text-muted">{{ $hint }}</small>
    </div>
</div>