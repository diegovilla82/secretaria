    <div id="error_comision" class="alert alert-danger" role="alert" style="display:none">
        <p id="text_error_comision"> <b>ERROR:</b> Debe seleccionar una provincia/localidad para continuar'</p>
    </div>

    {{-- EXP/ACT --}}
    <div class="row">
        <div class="col-auto">
            <label>Act/Exp</label>
        </div>
        <div class="col-auto">
            <select class="form-control" wire:model.lazy='exp1' id="exp1" name="exp1">
                <option value="E">E</option>
            </select>
        </div>
        <div class="col-auto" style="width:100px">
            <input type="number" class="form-control" wire:model.lazy='exp2' id="exp2" name="exp2" value="10"
                placeholder="10">
        </div>
        <div class="col-auto" style="width:100px">
            <input type="number" class="form-control" wire:model.lazy='exp3' id="exp3" name="exp3" placeholder="Año"
                value="2019">
        </div>
        <div class="col-auto" style="width:180px">
            <input type="text" class="form-control" wire:model.lazy='exp4' id="exp4" name="exp4" placeholder="Numero"
                value="">
        </div>
        <div class="col-auto">
            <select class="form-control" wire:model.lazy='exp5' id="exp5" name="exp5">
                <option value="A">A</option>
                <option value="E">E</option>
            </select>
        </div>
    </div>
    <br>
    @if(!$isEdit)

    <div class="col-md-12">
        <div class="form-group">
            <label>Agentes</label>
            <div wire:ignore>
                <select tabindex=1 id="agentes-dropdown" class="form-control" multiple=true
                    wire:model="agentesSelected">
                    @foreach ($agentes as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>
    @else
        <x-admin.card title="Agentes" >
            <x-front.modal key="AddAgente" classes="btn-primary btn-sm float-right" title="Agregar Agente">
                <livewire:admin.agentes.add-agente-comision :comision='request()->id'>
            </x-front>
            <br>
            <br>
             <livewire:admin.agentes.agentes-comision :comision='request()->id'>
        </x-admin.card>

    @endif

    <div class="row">
        <div class="col-md-2">
            <label> Fuera de la provincia? : </label>
        </div>
        <div class="col-md-1">
            <input type="checkbox" tabindex=3 wire:model='comision.externo' id="externo" name="externo" value="1" />
        </div>
        <div class="col-md-2">
            <label id="destino"> Destino/s : </label>
        </div>
        <div class="col-md-4">
            <div @if ($comision->externo != null) style="display:none" @endif>
                <div wire:ignore>
                    <select tabindex=4 id="localidades-dropdown" class="form-control" multiple=true
                        wire:model="localidadesSelected">
                        @foreach ($localidades as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div @if ($comision->externo == null) style="display:none" @endif>
                <x-admin.select1 model="provinciaSelected" :values="$provincias" classes="col-md-12" tabindex=5 />
            </div>
        </div>
    </div>
    <br>

    <x-admin.input :disabled="$disabled" title="Motivo" model="comision.motivo" tabindex=2 classes="col-md-12" />

    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Chofer</label>
                <div wire:ignore>
                    <select tabindex=2 id="chofer-dropdown" class="form-control" wire:model="choferSelected">
                        @foreach ($chofer as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <x-admin.input :disabled="$disabled" title="Marca y modelo" model="comision.marca_modelo" required=true
            tabindex=4 classes="col-md-2" />
        <x-admin.input :disabled="$disabled" title="Patente" model="comision.patente" required=true tabindex=5
            classes="col-md-2" />
        <x-admin.input :disabled="$disabled" title="Combustible($)" model="comision.combustible" required=true
            tabindex=5 classes="col-md-2" />
        <x-admin.input :disabled="$disabled" title="Dias" model="comision.dias" required=true tabindex=6
            classes="col-md-2" />
        <x-admin.input type="date" :disabled="$disabled" title="Fecha Salida" model="comision.fecha_salida"
            required=true tabindex=7 classes="col-md-2" />

    </div>


    <div class="row">
        <x-admin.input type="date" :disabled="$disabled" title="Fecha Resolucion" model="resolucion.fecha" required=true
            tabindex=7 classes="col-md-2" />

        <x-admin.input type="number" :disabled="$disabled" title="Num. Res." model="resolucion.numero" required=true
            tabindex=7 classes="col-md-2" />
    </div>


    {{-- <div class="form-row align-items-center">
        <div class="col-md-3">
            <label> Comision Pasaje: </label>
        </div>
        <div class="col-md-1">
            <input type="checkbox" id="check_pasaje" name="check_pasaje" value="1" />
        </div>
        <div class="col-md-2">
            <label> Auto </label>
        </div>
        <div class="col-md-1">
            <input type="checkbox" id="check_vehiculo" name="check_vehiculo" checked="checked" />
        </div>
    </div> --}}


    @section('js')

        <script>
            $(document).ready(function() {
                $('#agentes-dropdown').select2({
                    theme: 'bootstrap4',
                    allowClear: true
                });
                $('#chofer-dropdown').select2({
                    theme: 'bootstrap4',
                    allowClear: true
                });
                $('#localidades-dropdown').select2({
                    theme: 'bootstrap4',
                    allowClear: true
                });
                $('#provincia-dropdown').select2({
                    theme: 'bootstrap4',
                    allowClear: true
                });
            });




            $('#agentes-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('agentesSelected', data);

                var str_array = $('#agentes-dropdown').val();
                var array = $('#agentes-dropdown option:not(:selected)');


                var $dropdown = $("#chofer-dropdown");
                $dropdown.empty();
                $.each(array, function() {
                    $dropdown.append($("<option />").val(this.value).text(this.text));
                });
                //                $("#chofer").val("null").trigger("change");
                //    $('#chofer').select2('open');
            });

            $('#chofer-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('choferSelected', data);
            });

            $('#localidades-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('localidadesSelected', data);
            });
        </script>
    @endsection
