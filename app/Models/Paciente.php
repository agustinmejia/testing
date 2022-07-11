<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'nombre_completo',
        'ci',
        'ci_exp',
        'fecha_nac',
        'genero',
        'imagen',
        'celular',
        'direccion'
    ];
}
