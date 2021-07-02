@props([
  'title',
  'active' => false,
  'pages' => [],
  'key'
])
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-{{ $key }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ $title }}
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $key }}">
    @foreach ($pages as $page)
    <a class="dropdown-item" href="{{ route('pages.show', $page->id) }}">{{ $page->title }}</a>
    @endforeach
  </div>
</li>