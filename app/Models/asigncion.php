<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asigncion extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion', 'asignacion','id_alumnos','id_apoderados','estado'
    ];

    protected $table = 'asigncions';
}
