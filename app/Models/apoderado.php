<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apoderado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_apo', 'rut_apo', 'telefono_apo', 'correo_apo'
    ];

    protected $table = 'apoderados';
}
