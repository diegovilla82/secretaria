<?php

use Illuminate\Database\Seeder;
use App\TipoResolucion;

class TipoResolucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad = new TipoResolucion();
        $entidad->nombre = 'ADJUDICACIÓN DE OBRA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'AFECTAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'ANTICIPO FUENTES DE RECURSOS';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'ANTICIPO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'APROBAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'APROPIACIÓN AL EJERCICIO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre =
            'AYUDA ECONÓMICA AL BENEFICIARIO Y SU GRUPO FAMILIAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'BONIFICACIÓN POR TITULO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'BÚSQUEDA DE ACTUACIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'CAJA CHICA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'CANCELACIÓN DE HIPOTECA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'CERTIFICADO DE DESEMBOLSO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'COMISIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'CONTRATAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'DAR DE BAJA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'DEJAR SIN EFECTO RESOLUCIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'DEJAR SIN EFECTO ADSCRIPCIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'DEJAR SIN EFECTO DONACIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'DEJAR SIN EFECTO LICENCIA EXTRAORDINARIA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'DEPOSITAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'HABILITACIÓN DE CAJA CHICA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'LICENCIA EXTRAORDINARIA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'LLAMADO A CONCURSO DE PRECIOS';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'LLAMADO A LICITACIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'MEJORAR RENOVAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'NUEVO MONTO DE COMBUSTIBLE';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'ORDEN DE PAGO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'PAGO A LA FIRMA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'PAGO CERTIFICADO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'REALIZAR TRANSFERENCIA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'REGIONALIZACIÓN';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'RENDICIÓN DE VIÁTICOS PRESENTADA';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'PAGO A LA FIRMA MEJORAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'PRESTAMO DE VEHICULO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'REINTEGRO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'REDETERMINACION DE PRECIO';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'PAGAR A ';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }

        $entidad = new TipoResolucion();
        $entidad->nombre = 'PAGO A LA FIRMA MEJORAR';
        if (TipoResolucion::where('nombre', $entidad->nombre)->count() == 0) {
            $entidad->save();
        }
    }
}
