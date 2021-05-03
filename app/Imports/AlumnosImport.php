<?php

namespace App\Imports;


use App\Models\Alumnos;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[3]=='si'){
            return new Alumnos([

                'nombre' => $row[0],
                'rut'    => $row[1],
                'clave'  => $row[2],
                'selecionado' => $row[3],
            ]);
        }
        
    }
}
