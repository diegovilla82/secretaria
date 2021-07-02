@props([
  'title',
  'link',
  'active' => false,
  'target' => '_self'
])

<li class="nav-item 
@if ($active)
    {{ (request()->is($active.'*')) ? 'active' : '' }}
@endif">
  <a class="nav-link" target="{{ $target }}" href="{{ $link }}">{{ $title }}</a>
</li>