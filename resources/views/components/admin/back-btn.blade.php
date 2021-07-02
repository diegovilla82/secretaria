@props(['route'])

<div class="row">
  <div class="col-md-12">
    <p>
      <a class="btn btn-primary pull-rigth" href="{{ route($route)}}">
          <i class="fas fa-chevron-left"></i>
          Volver
      </a>
    </p>
  </div>
</div>