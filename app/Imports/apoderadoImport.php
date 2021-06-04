<?php

namespace App\Imports;

use App\Models\apoderado;
use Maatwebsite\Excel\Concerns\ToModel;

class apoderadoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new apoderado([
            //
        ]);
    }
}
