<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new Cargo();
        $entidad->nombre = 'Administrativo 1';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Administrativo 2';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Administrativo 3';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Administrativo 4';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Administrativo 5';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Director 1';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Director 2';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Jefe Departamento';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Personal de Gabinete';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Personal Transitorio';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'PRESIDENTE DEL I.P.D.U.V.';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 1';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 2';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 3';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 4';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 5';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 6';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 7';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 8';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 9';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Profesional 10';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 1';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 2';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 3';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 4';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 5';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 6';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Servicio 7';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'VOCAL  DEL I.P.D.U.V.';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Cargo();
        $entidad->nombre = 'Otros';
        $entidad->monto = 0;
        if (Cargo::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }
    }
}
