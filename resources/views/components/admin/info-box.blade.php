@props([
  'classes' => null,
  'bg'      => 'info',
  'icon'    => 'fas fa-cog',
  'title'   => 'Titulo',
  'value'   => 0,
  'route'    => false,
])

<div class="{{ $classes }}">
  <div class="small-box bg-{{ $bg }}">
    <div class="inner">
      <h3>{{ $value }}</h3>

      <p>{{ $title }}</p>
    </div>
    <div class="icon">
      <i class="{{ $icon }}"></i>
    </div>
     @if ($route)
    <a href="{{ route($route) }}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
     @endif
  </div>
</div>