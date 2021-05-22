<?php

use Illuminate\Database\Seeder;
use App\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new Provincia();
        $entidad->nombre = 'BUENOS AIRES';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'CATAMARCA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'CHACO';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'CHUBUT';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'CÓRDOBA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'CORRIENTES';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'ENTRE RÍOS';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'FORMOSA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'JUJUY';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'LA PAMPA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'LA RIOJA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'MENDOZA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'MISIONES';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'NEUQUÉN';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'RÍO NEGRO';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'SALTA';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'SAN JUAN';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'SAN LUIS';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'SANTA CRUZ';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'SANTA FÉ';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'SANTIAGO DEL ESTERO';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'TIERRA DEL FUEGO';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Provincia();
        $entidad->nombre = 'TUCUMÁN';
        if (Provincia::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }
    }
}
