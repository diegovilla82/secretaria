<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
        body {
            margin: 3cm 2cm 2cm;
            font-family: Arial;
            font-size: 13px;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: white;
            text-align: center;
            line-height: 30px;
        }


            table td, table th, #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 9px;
            }

            #agentes th {
            padding-top: 2px;
            padding-bottom: 2px;
            text-align: left;
            }
            
        table, th, td {
            border: 1px solid black;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

    </style>
</head>

<body>
    <header>

    </header>
    <main>
    <div style="padding-left: 350px"> <b>RESISTENCIA, </b> </div>
    <br>

    @if($comision->act_exp)
    {{-- SI TIENE ACTUACION EXPEDIENTE VA VISTO:  --}}
        <div> <b>VISTO: {{ $comision->act_exp }} </b> </div>
    @else 
        <div> <b>VISTO Y CONSIDERANDO: </b> </div>
    @endif
    <br>
    <br>

     @if(!$comision->act_exp)
    {{-- SI TIENE ACTUACION EXPEDIENTE VA VISTO:  --}}
        <div> <b>VISTO Y CONSIDERANDO </b> </div>
    @endif 

    <span style="padding-left: 170px;">
    La Necesidad, de que se comisione a los Agentes:
    <b>
    @foreach ($comision->agentes as $agente )
        {{ $agente->nombre . ', ' }} 
    @endforeach 
    </b>
    para que se trasladen a la/s {{ $comision->externo ? 'Provincia' : 'Localidad/es' }} de 
    {{ $comision->destinosLW()}} con el objeto de {{ $comision->motivo}} ;
    </span><br><br>

    <span style="padding-left: 170px;">
    Que, la comisión de referencia, se llevará a cabo en el vehículo particular 
    {{ $comision->marca_modelo}} – chapa patente {{ $comision->patente}}, conducido por {{ $comision->chofer($comision->id) }};
    </span><br><br>

    <span style="padding-left: 170px;">
    Que, en consecuencia, debe anticiparse el  importe correspondiente a viáticos 
    (de acuerdo a lo dispuesto en los Decretos Nros 1324/78, 2055/14) y combustible;
    </span><br><br>

    <span style="padding-left: 170px;">
    Que, el suscripto está facultado a autorizar comisiones y viáticos;
    </span><br><br>

    <<span style="padding-left: 170px;">
    Que, conforme Memorándum Nº 050/14 de Contaduría General, “Si el Subresponsable 
    no efectuare la rendiciones y/o reintegro del excedente del presente anticipo dentro del plazo reglamentario, 
    autoriza expresamente a retener de sus haberes los importes recibidos y/o reintegrados”;
    </span><br><br>

    <div style="text-align: center;"> 
    EL PRESIDENTE DEL INSTITUTO PROVINCIAL DE <br>
    DESARROLLO URBANO Y VIVIENDA <br>
    R E S U E L V E: <br>
    </div>
    <br><br>

    <p>
    <b>ARTÍCULO 1º: AUTORÍZASE</b> la comisión de servicios a realizar por 
    <b>
    @foreach ($comision->agentes as $agente )
        {{ $agente->nombre . ', ' }}        
    @endforeach 
    </b>
    para que se trasladen a la/s {{ $comision->externo ? 'Provincia' : 'Localidad/es' }} de 
    {{ $comision->destinosLW()}} por el término de {{ $comision->dias }} días y a partir del
    {{ date('d.m.Y', strtotime($comision->fecha_salida)) }}, 
    por los motivos expuestos en el primer considerando de la presente. 
    </p>

    <p>
    <b>ARTÍCULO 2°: ANTICIPESE</b> por la Dirección Contable de este Instituto, lo que se enuncia.
    </p>

        <table id="agentes">
            <thead>
                <tr>
                    <th>Sr/a</th>
                    <th>CUIL</th>
                    <th>Mod. Revista</th>
                    <th>Categoria</th>
                    <th>Apartado</th>
                    <th>Cargo</th>
                    <th>CEIC</th>
                    <th>Viaticos</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($comision->agentes as $agente )            
                <tr>
                    <td> <b> {{$agente->nombre}}</b> </td>
                    <td>{{$agente->cuit}}</td>
                    <td>{{$agente->situacion_revista_id}}</td>
                    <td>{{$agente->escalafon_id}}</td>
                    <td>{{$agente->categoria_id}}</td>
                    <td>{{$agente->apartado}}</td>
                    <td>{{$agente->cargo->nombre}}</td>
                    <td>{{ '$' . $agente->montoComisiones()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    <p>
    <b>ARTÍCULO 3º:</b> El gasto emergente de lo dispuesto en la presente Resolución, deberá imputarse a la 
    partida específica del Instituto, de acuerdo a la naturaleza del mismo.

    <p>
    <b>ARTÍCULO 4º:</b> Si el Subresponsable no efectuare las rendiciones y/o reintegro del excedente del 
    presente anticipo dentro del plazo reglamentario, autoriza expresamente a retener de sus haberes los 
    importes recibidos y/o reintegrados. Según Memorándum Nº 050/14 de Contaduría General.
    </p>

    <p>
    <b>ARTÍCULO 5º: DESE</b> al Registro de este Instituto, efectuadas las comunicaciones pertinentes, archívese.
    </p>
    
    <p>
        <b>RESOLUCIÓN  N°__________________/</b>
    </p>
    </main>

</body>

</html>
