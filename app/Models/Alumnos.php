<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    protected $fillable = [
        'marca_temporal', 'nombre', 'curso', 'rut','estado'
    ];

    protected $table = 'alumnos';
}
