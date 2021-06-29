<?php

namespace App\Exports;

use App\Models\Alumnos;
use App\Models\prestamo;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlumnosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return prestamo::join('alumnos','prestamos.id_alumnos','=','alumnos.id')
        ->join('apoderados','prestamos.id_apoderados','=','apoderados.id')
        ->select('alumnos.nombre','alumnos.rut','apoderados.nombre_apo','apoderados.rut_apo','apoderados.telefono_apo','apoderados.correo_apo','prestamos.estado','prestamos.marca','prestamos.s_n','prestamos.comentario')->get();
    }
}
