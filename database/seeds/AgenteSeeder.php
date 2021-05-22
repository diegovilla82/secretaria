<?php

use Illuminate\Database\Seeder;
use App\Agente;

class AgenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new Agente();
        $entidad->nombre = 'Federico Barraza';
        $entidad->cuit = 20202020;
        $entidad->situacion_revista_id = 1;
        $entidad->escalafon_id = 1;
        $entidad->categoria_id = 1;
        $entidad->apartado = 1;
        $entidad->cargo_id = 1;
        $entidad->ceic = 1;
        $entidad->grupo = 1;
        $entidad->numero = 1;
        if (Agente::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new Agente();
        $entidad->nombre = 'Hugo Fernandez';
        $entidad->cuit = 323232;
        $entidad->situacion_revista_id = 2;
        $entidad->escalafon_id = 2;
        $entidad->categoria_id = 2;
        $entidad->apartado = 2;
        $entidad->cargo_id = 2;
        $entidad->ceic = 2;
        $entidad->grupo = 2;
        $entidad->numero = 2;
        if (Agente::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }
    }
}
