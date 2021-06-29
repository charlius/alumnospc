<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_apoderados','id_alumnos','marca','s_n','detalle','comentario','estado'
    ];

    protected $table = 'prestamos';
}
