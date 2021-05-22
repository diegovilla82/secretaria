<div class = "row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                Datos <strong>Resolución</strong>
            </div>
            <div class="card-body card-block">

                        <div id = "error_resolucion_existente" class="alert alert-danger" role="alert"  style="display:none">
                            <button type="button" id="closeAlert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p id= "error_resolucion_existente_texto"></p>
                        </div>

                        <div class="form-row align-items-center">
                            <div class="col-md-1">
                                <label> Tipo Res.: </label>
                            </div>
                            <div class="col">
                                <select class="js-example-basic-single" id="tipo_resolucion" name="tipo_resolucion" style="width: 80%">
                                    <option disabled selected value> </option>
                                        @foreach($tipo_resolucion as $l)
                                            <option value="{{$l->id}}">{{$l->nombre}}</option>
                                        @endforeach
                                </select>
                                {{-- <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalTipoResolucion"><span class="fa fa-plus"></span></button> --}}
                            </div>
                            <div class="col-md-1">
                                <label> Resolucion: </label>
                            </div>
                            <div class="col">
                                    <input type="number" class="form-control" id="resolucion" name="resolucion" value= "@if( isset($resolucion->numero) ){{ $resolucion->numero }}@endif" required="">
                            </div>
                            <div class="col-md-1">
                                <label> Fecha res.: </label>
                            </div>
                            <div class="col">
                                {{-- <input id="fecha" name="fecha" type="date" class="form-control" value ="@if( isset($resolucion->fecha) ){{ Carbon\Carbon::parse($resolucion->fecha)->format('d/m/Y') }}@endif"/> --}}
                                {{  Form::date('fecha', \Carbon\Carbon::now(), ['class' => 'form-control', 'id'=> 'fecha' ]) }}
                            </div>

                        </div>

                    <br>
            </div>
        </div>
    </div>
</div>
