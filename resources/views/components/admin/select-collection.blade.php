@props(
    ['title', 
    'model', 
    'collection'      => [],
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
        <select class="form-control" 
            wire:model.lazy='{{ $model }}'
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            @if ($multi) multiple @endif 
            tabindex={{ $tabindex }}
        >
        @foreach ($collection as $key => $c)
            <option value="{{ $c->name }}" @if('default' == $c->name) selected="selected" @endif >{{ $c->name }}</option>
        @endforeach
        </select>
    </div>
</div>