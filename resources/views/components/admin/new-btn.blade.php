@props(['route','title' => 'Agregar'])

<div class="row">
  <div class="col-md-12">
    <p>
      <a class="btn btn-primary pull-rigth" href="{{ route($route) }}">
          <i class="fas fa-plus-circle"></i>
          {{ $title }}
      </a>
    </p>
  </div>
</div>