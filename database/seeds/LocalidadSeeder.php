<?php

use Illuminate\Database\Seeder;
use App\Localidad;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new Localidad();
        $entidad->nombre = 'AVIA TERAI';
        $entidad->departamento_id = 14;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'BARRANQUERAS';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'BASAIL';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CAMPO LARGO';
        $entidad->departamento_id = 14;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CAPITAN SOLARI';
        $entidad->departamento_id = 24;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CIERVO PETISO';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA ABORIGEN';
        $entidad->departamento_id = 4;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA BARANDA';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA BENITEZ';
        $entidad->departamento_id = 2;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA EL CURUND';
        $entidad->departamento_id = 20;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA ELISA';
        $entidad->departamento_id = 24;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA PASTORIL Y PEGURIEL';
        $entidad->departamento_id = 18;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIA POPULAR';
        $entidad->departamento_id = 15;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COLONIAS UNIDAS';
        $entidad->departamento_id = 24;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COMANDANCIA FRIAS';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CONCEPCION DEL BERMEJO';
        $entidad->departamento_id = 6;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CORONEL DU GRATY';
        $entidad->departamento_id = 18;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CORZUELA';
        $entidad->departamento_id = 11;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'COTE LAI';
        $entidad->departamento_id = 25;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CHARADAI';
        $entidad->departamento_id = 25;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'CHARATA';
        $entidad->departamento_id = 5;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CHOROTIS';
        $entidad->departamento_id = 10;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL ESPINILLO';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL SAUZAL';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL SAUZALITO';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL TARTAGAL';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL VIZCACHERAL';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'ENRIQUE URIEN';
        $entidad->departamento_id = 18;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'FONTANA';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'FORTIN LAVALLE';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'FUERTE ESPERANZA';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'GANCEDO';
        $entidad->departamento_id = 1;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'GENERAL CAPDEVILLA';
        $entidad->departamento_id = 1;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'GENERAL PINEDO';
        $entidad->departamento_id = 1;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'GENERAL SAN MARTIN';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'GENERAL VEDIA';
        $entidad->departamento_id = 7;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'HERMOSO CAMPO';
        $entidad->departamento_id = 3;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'ISLA DEL CERRITO';
        $entidad->departamento_id = 7;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'ITIN';
        $entidad->departamento_id = 1;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'JUAN JOSE CASTELLI';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'LA CLOTILDE';
        $entidad->departamento_id = 19;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LA EDUVIGIS';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LA ESCONDIDA';
        $entidad->departamento_id = 12;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LA LEONESA';
        $entidad->departamento_id = 7;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LA MATANZA';
        $entidad->departamento_id = 17;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LA TIGRA';
        $entidad->departamento_id = 19;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LA VERDE';
        $entidad->departamento_id = 12;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAGUNA BLANCA';
        $entidad->departamento_id = 15;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAGUNA LIMPIA';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAPACHITO';
        $entidad->departamento_id = 12;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10
        $entidad = new Localidad();
        $entidad->nombre = 'LAS BREÑAS';
        $entidad->departamento_id = 5;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAS GARCITAS';
        $entidad->departamento_id = 24;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAS HACHERAS';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAS PALMAS';
        $entidad->departamento_id = 7;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAS PIEDRITAS';
        $entidad->departamento_id = 8;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LAS TOLDERIAS';
        $entidad->departamento_id = 19;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'LOS FRENTONES';
        $entidad->departamento_id = 6;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'MACHAGAI';
        $entidad->departamento_id = 4;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'MAKALLE';
        $entidad->departamento_id = 12;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'MARGARITA BELEN';
        $entidad->departamento_id = 2;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'MESON DE FIERRO';
        $entidad->departamento_id = 1;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'MIRAFLORES';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'MISION NUEVA POMPEYA';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'NAPENAY';
        $entidad->departamento_id = 14;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'OLLA QUEBRADA';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PAMPA ALMIRON';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PAMPA DEL INDIO';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PAMPA DEL INFIERNO';
        $entidad->departamento_id = 6;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PAMPA LANDRIEL';
        $entidad->departamento_id = 1;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PRESIDENCIA DE LA PLAZA';
        $entidad->departamento_id = 20;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'PRESIDENCIA ROCA';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PRESIDENCIA ROQUE SAENZ PEÑA';
        $entidad->departamento_id = 9;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PUERTO ANTEQUERAS';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PUERTO BASTIANI';
        $entidad->departamento_id = 15;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PUERTO BERMEJO';
        $entidad->departamento_id = 7;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PUERTO EVA PERON';
        $entidad->departamento_id = 7;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PUERTO TIROL';
        $entidad->departamento_id = 15;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PUERTO VILELAS';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'QUITILIPI';
        $entidad->departamento_id = 21;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'RESISTENCIA';
        $entidad->departamento_id = 22;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'RIO MUERTO';
        $entidad->departamento_id = 6;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'SAMUHU';
        $entidad->departamento_id = 23;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'SAN BERNARDO';
        $entidad->departamento_id = 19;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'SANTA SYLVINA';
        $entidad->departamento_id = 10;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'SELVAS DEL RIO DE ORO';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'TACO POZO';
        $entidad->departamento_id = 6;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'TRES ISLETAS';
        $entidad->departamento_id = 17;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'TRES MOJONES';
        $entidad->departamento_id = 10;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'VIBORAS BLANCAS';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'VILLA ANGELA';
        $entidad->departamento_id = 8;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        // PASARON 10

        $entidad = new Localidad();
        $entidad->nombre = 'VILLA BERTHET';
        $entidad->departamento_id = 23;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'VILLA RIO BERMEJITO';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'WICHI';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'ZAPARINQUI';
        $entidad->departamento_id = 13;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'DEPARTAMENTO COMANDANTE FERNANDEZ';
        $entidad->departamento_id = 9;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'PRESIDENCIA ROQUE SAENZ PEÑA';
        $entidad->departamento_id = 26;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'CONCEPCION DEL BERMEJO';
        $entidad->departamento_id = 6;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'GRAL.JOSE DE SAN MARTIN';
        $entidad->departamento_id = 16;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL PALMAR';
        $entidad->departamento_id = 21;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Localidad();
        $entidad->nombre = 'EL CURUNDU';
        $entidad->departamento_id = 20;
        if (Localidad::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }
    }
}
